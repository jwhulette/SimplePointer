<?php

namespace Tests\Browser;

use App\Room;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Collection;

/**
 * @group join
 */
class JoinRoomTest extends DuskTestCase
{
    protected Room $room;

    protected Collection $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->room = Room::factory()->create();

        $this->user = User::factory(3)->create([
            'room_id' => $this->room->uuid,
        ]);
    }

    public function test_user_can_be_added_to_room()
    {
        $roomUuid = $this->room->uuid;

        $users = $this->user;

        $this->browse(function (Browser $browser1, Browser $browser2, Browser $browser3) use ($roomUuid, $users) {
            $userOne = $users->get(0);

            $userTwo = $users->get(1);

            $observer = $users->get(2);

            $browser1->visit("$roomUuid/room")
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name, 20)
                ->assertSee($userOne->name);

            $browser2->visit("$roomUuid/room")
                ->type('name', $userTwo->name)
                ->press('Player')
                ->waitForText($userTwo->name, 20)
                ->assertSee($userOne->name)
                ->assertSee($userTwo->name);

            $browser3->visit("$roomUuid/room")
                ->type('name', $observer->name)
                ->press('Observer')
                ->waitForText($observer->name, 20)
                ->assertSee($userOne->name)
                ->assertSee($userTwo->name)
                ->assertSee($observer->name);
        });
    }
}
