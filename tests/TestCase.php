<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Override;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public bool $seed = true;

    #[Override]
    public function setUp(): void
    {
        parent::setUp();
    }

    #[Override]
    public function tearDown(): void
    {
        parent::tearDown();
    }
}
