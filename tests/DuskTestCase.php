<?php

namespace Tests;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Artisan;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    protected Generator $faker;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh --seed');

        $this->faker = Factory::create(Factory::DEFAULT_LOCALE);
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions())->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
            '--no-sandbox',
        ]);

        // if env file says to use Docker stuff
        if (env('USE_CONTAINER_BROWSER', 'false') === 'true') {
            return RemoteWebDriver::create(
                'http://chrome:3000/webdriver',
                DesiredCapabilities::chrome()->setCapability(
                    ChromeOptions::CAPABILITY,
                    $options
                )
            );
        } else {
            return RemoteWebDriver::create(
                'http://localhost:9515',
                DesiredCapabilities::chrome()->setCapability(
                    ChromeOptions::CAPABILITY,
                    $options
                )
            );
        }
    }
}
