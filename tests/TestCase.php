<?php

namespace Smousss\Laravel\Globalize\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Smousss\Laravel\Globalize\GlobalizeServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [GlobalizeServiceProvider::class];
    }
}
