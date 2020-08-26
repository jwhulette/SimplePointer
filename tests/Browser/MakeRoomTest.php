<?php

namespace Tests\Browser;

use App\Room;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Collection;

class MakeRoomTest extends DuskTestCase
{
    protected Room $room;
    protected Collection $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->room = factory(Room::class)->create();

        $this->user = factory(User::class, 2)->create([
            'room_id' => $this->room->uuid,
        ]);
    }

    public function test_user_can_be_added_to_room()
    {
        $roomUuid = $this->room->uuid;

        $users = $this->user;

        $this->browse(function (Browser $browser1, Browser $browser2) use ($roomUuid, $users) {
            $userOne = $users->get(0);

            $userTwo = $users->get(1);

            $browser1->visit("$roomUuid/room")
                    ->assertSee('Register for room')
                    ->type('name', $userOne->name)
                    ->press('Player')
                    ->pause(2000)
                    ->assertSee($userOne->name);

            $browser2->visit("$roomUuid/room")
                    ->assertSee('Register for room')
                    ->type('name', $userTwo->name)
                    ->press('Player')
                    ->pause(2000)
                    ->assertSee($userOne->name)
                    ->assertSee($userTwo->name);
        });
    }
}
