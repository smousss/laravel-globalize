![Globalize](https://user-images.githubusercontent.com/3613731/233782928-31e9677d-4c0c-4726-923e-ce6a7086c85d.png)

# Make entire Laravel projects translatable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smousss/laravel-globalize.svg?style=flat-square)](https://packagist.org/packages/smousss/laravel-globalize)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smousss/laravel-globalize/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smousss/laravel-globalize/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smousss/laravel-globalize.svg?style=flat-square)](https://packagist.org/packages/smousss/laravel-globalize)

Wrapping up every translatable piece of text in every view of an existing Laravel project inside the __() helper is a time-consuming and boring assignment. Luckily, artificial intelligence is perfectly suited for repetitive actions.

```diff
-<h2>Create a new post</h2>
+<h2>{{ __('Create a new post') }}</h2>
…
-<footer>© {{ config('app.name') }} {{ date('Y') }}. All rights reserved.</footer>
+<footer>{{ __('© :name :date. All rights reserved.', [
+    'name' => config('app.name'),
+    'date' => date('Y'),
+]) }}</footer>
```

## Installation

Install the package via Composer:

```bash
composer require smousss/laravel-globalize
```

Publish the config file:

```bash
php artisan vendor:publish --tag=globalize-config
```

## Usage

First, [generate a secret key](https://smousss.com/dashboard) on smousss.com.

Then, add it to your `SMOUSSS_SECRET_KEY` environment variable.

Finally, internationalize your views:

```bash
php artisan smousss:globalize
```

Globalize will ask you if you want to process all your views or a selection of them.

```bash
Should Globalize process a particular file or everything? [Choose files]:
[0] Choose files
[1] Process everything!
```

## Credits

Globalize for Laravel has been developed by [Benjamin Crozat](https://benjamincrozat.com) for [Smousss](https://smousss.com) ([Twitter](https://twitter.com/benjamincrozat)).

## License

[MIT](LICENSE.md)
