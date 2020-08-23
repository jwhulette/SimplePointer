<?php

namespace Tests\Browser;

use App\Room;
use Ramsey\Uuid\Uuid;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Faker\Factory as Faker;

class MakeRoomTest extends DuskTestCase
{
    public function test_user_can_be_added_to_room()
    {
        // Add the new room
        $room = Room::first();

        $roomUuid = $room->uuid;

        $name = Faker::create()->firstName;

        $this->browse(function (Browser $browser) use ($roomUuid, $name) {
            $browser->visit("$roomUuid/room")
                    ->assertSee('Register for room')
                    ->type('name', $name)
                    ->press('Player')
                    ->pause(2000)
                    ->assertSee($name);
        });
    }
}
