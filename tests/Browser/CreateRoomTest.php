<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CreateRoomTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_user_can_create_new_room()
    {
        $faker = $this->faker;

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
