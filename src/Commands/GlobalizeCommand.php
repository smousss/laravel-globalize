<?php

namespace Smousss\Laravel\Globalize\Commands;

use SplFileInfo;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class GlobalizeCommand extends Command
{
    public $signature = 'smousss:globalize';

    public $description = 'Wrap every string in your views using the __() helper';

    public function handle() : int
    {
        if (empty(config('globalize.secret_key'))) {
            $this->error('Please generate a secret key on smousss.com and add it to your .env file as SMOUSSS_SECRET_KEY.');

            return self::FAILURE;
        }

        $views = $this->getViews();

        $choice = $this->choice('Should Smousss process a particular file or everything?', [
            'Choose files',
            'Process everything!',
        ], 0);

        if ($choice === 'Choose files') {
            $choices = $this->choice('Which file should Smousss process?', $views->toArray(), 0, null, true);

            collect($choices)->each($this->processView(...));
        } else {
            $views->each($this->processView(...));
        }

        $this->newLine();

        $this->line('Done! 🎉');

        return self::SUCCESS;
    }

    protected function processView(string $filePath, int $key) : void
    {
        $content = File::get($filePath);

        $shouldAddNewLineAtEOF = preg_match('/\n$/', $content);

        if ($key) {
            $this->newLine();
        }

        $fileRelativePath = Str::after($filePath, base_path());

        $this->line("GPT-4 is generating tokens for {$fileRelativePath}… (GPT-4 can be slow sometimes, but don't worry!)");

        $response = Http::withToken(config('globalize.secret_key'))
            ->timeout(300)
            ->post('https://smousss.com/api/globalize', compact('content'))
            ->throw()
            ->json();

        File::put($filePath, $response['data'] . ($shouldAddNewLineAtEOF ? PHP_EOL : ''));

        $this->info("Finished processing $fileRelativePath ✅ (Consumed tokens: " . $response['meta']['consumed_tokens'] . ')');
    }

    protected function getViews() : Collection
    {
        return collect(File::allFiles(resource_path('views')))->map(function (SplFileInfo $file) {
            if (str($file)->endsWith('.blade.php')) {
                return $file->getPathname();
            }
        })->filter();
    }
}
