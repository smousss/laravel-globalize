<?php

use Illuminate\Support\Facades\Artisan;

it('registers a command', function () {
    $registered = array_key_exists('smousss:globalize', Artisan::all());

    expect($registered)->toBeTrue();
});
