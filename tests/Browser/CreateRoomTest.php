<?php

namespace Tests\Browser;

use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CreateRoomTest extends DuskTestCase
{
    public function test_user_can_create_new_room()
    {
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        $this->browse(function (Browser $browser) use ($faker) {
            $browser->visit('/')
                    ->assertSee('Simple Pointer')
                    ->type('name', $faker->word)
                    ->select('card_set')
                    ->press('Create Room')
                    ->assertPathIsNot('/home');
        });
    }
}
