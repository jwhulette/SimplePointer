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

            // userOne joins
            $browser1->visit("$roomUuid/room")
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name);

            // userTwo joins
            $browser2->visit("$roomUuid/room")
                ->type('name', $userTwo->name)
                ->press('Player')
                ->waitForText($userTwo->name);

            // userOne casts their vote
            $browser1->press('3');

            // userTwo votes and cards are shown
            $text = $browser2->press('3')
                ->waitFor('@avg-vote')
                ->text('@avg-vote');

            // if userOne was able to change their mind the average will be three
            $this->assertEquals($text, '3.0');
        });
    }

    public function test_users_can_change_vote_before_reveal()
    {
        $roomUuid = $this->room->uuid;

        $users = $this->user;

        $this->browse(function (Browser $browser1, Browser $browser2) use ($roomUuid, $users) {
            $userOne = $users->get(0);

            $userTwo = $users->get(1);

            // userOne joins
            $browser1->visit("$roomUuid/room")
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name);

            // userTwo joins
            $browser2->visit("$roomUuid/room")
                ->type('name', $userTwo->name)
                ->press('Player')
                ->waitForText($userTwo->name);

            // userOne casts their vote
            $browser1->press('5');

            // userOne changes their mind
            $browser1->press('3');

            // userTwo votes and cards are shown
            $text = $browser2->press('3')
                ->waitFor('@avg-vote')
                ->text('@avg-vote');

            // if userOne was able to change their mind the average will be three
            $this->assertEquals($text, '3.0');
        });
    }
}
