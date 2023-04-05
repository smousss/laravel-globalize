# Globalize for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smousss/laravel-globalize.svg?style=flat-square)](https://packagist.org/packages/smousss/laravel-globalize)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smousss/laravel-globalize/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smousss/laravel-globalize/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smousss/laravel-globalize.svg?style=flat-square)](https://packagist.org/packages/smousss/laravel-globalize)

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

Then, internationalize your views:

```bash
php artisan smousss:globalize
```

Globalize will ask you if you want to globalize all your views or a selection of them.

```bash
Should Smousss process a particular file or everything? [Choose files]:
[0] Choose files
[1] Process everything!
```

## Credits

Globalize for Laravel has been developed by [Benjamin Crozat](https://benjamincrozat.com) for [Smousss](https://smousss.com) ([Twitter](https://twitter.com/benjamincrozat)).

## License

[MIT](LICENSE.md)
