<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class CreateRoomTest extends DuskTestCase
{
    public function test_user_can_create_new_room()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Simple Pointer')
                    ->type('name', 'Test Room')
                    ->select('card_set')
                    ->press('Create Room')
                    ->assertPathIsNot('/home');
        });
    }
}
