<?php

use Illuminate\Support\Facades\Artisan;

it('registers the command', function () {
    $registered = array_key_exists('smousss:globalize', Artisan::all());

    expect($registered)->toBeTrue();
});

it("throws an exception when the secret key isn't set", function () {
    $this->artisan('smousss:globalize')->assertExitCode(1);
});
