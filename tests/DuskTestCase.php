<?php

declare(strict_types=1);

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Sleep;
use Laravel\Dusk\TestCase as BaseTestCase;
use Override;
use PHPUnit\Framework\Attributes\BeforeClass;

use function uniqid;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     */
    #[BeforeClass]
    public static function prepare(): void
    {
        static::startChromeDriver(['--port=9515']);

        // Give ChromeDriver time to bind to port 9515
        Sleep::sleep(2);
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    #[Override]
    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--no-sandbox',
            '--user-data-dir=' . sys_get_temp_dir() . '/dusk-user-data-dir-' . uniqid(),
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );
    }
}
