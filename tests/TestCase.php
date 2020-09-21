<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected static $setUpHasRunOnce = false;

    public function setUp(): void
    {
        parent::setUp();

        if (! static::$setUpHasRunOnce) {
            Artisan::call('migrate:fresh');

            Artisan::call(
                'db:seed',
                ['--class' => 'DatabaseSeeder']
            );

            static::$setUpHasRunOnce = true;
        }
    }
}
