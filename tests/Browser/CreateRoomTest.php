<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateRoomTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function user_can_create_new_room()
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
