<?php

namespace Tests\Browser;

use App\Room;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Collection;

/**
 * @group vote
 */
class VoteTest extends DuskTestCase
{
    protected Room $room;
    protected Collection $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->room = Room::factory()->create();

        $this->user = User::factory(2)->create([
            'room_id' => $this->room->uuid,
        ]);
    }

    public function test_users_can_vote()
    {
        $roomUuid = $this->room->uuid;

        $users = $this->user;

        $this->browse(function (Browser $browser1, Browser $browser2) use ($roomUuid, $users) {
            $userOne = $users->get(0);

            $userTwo = $users->get(1);

            $browser1->visit("$roomUuid/room")
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name);

            $browser2->visit("$roomUuid/room")
                ->type('name', $userTwo->name)
                ->press('Player')
                ->waitForText($userTwo->name);

            $browser1->press('3');

            $text = $browser2->press('3')
                ->waitFor('@avg-vote', 10)
                ->text('@avg-vote');

            $this->assertEquals($text, '3.0');
        });
    }
}
