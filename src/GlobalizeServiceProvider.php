<?php

namespace Smousss\Laravel\Globalize;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Smousss\Laravel\Globalize\Commands\GlobalizeCommand;

class GlobalizeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package) : void
    {
        $package
            ->name('globalize')
            ->hasConfigFile()
            ->hasCommand(GlobalizeCommand::class);
    }
}
