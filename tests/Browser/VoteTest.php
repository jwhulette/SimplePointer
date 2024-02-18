<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Collection;
use Laravel\Dusk\Browser;
use Override;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

use function route;

class VoteTest extends DuskTestCase
{
    protected Room $room;

    /** @var Collection<int,User> */
    protected Collection $user;

    #[Override]
    public function setUp(): void
    {
        parent::setUp();

        /* @phpstan-ignore-next-line  */
        $this->room = Room::factory()->create();

        /* @phpstan-ignore-next-line  */
        $this->user = User::factory(2)->create([
            'room_id' => $this->room->uuid,
        ]);
    }

    #[Test]
    public function users_can_vote(): void
    {
        $roomUuid = $this->room->uuid;

        $users = $this->user;

        $this->browse(function (Browser $browser1, Browser $browser2) use ($roomUuid, $users): void {
            $userOne = $users->get(0);

            $userTwo = $users->get(1);

            // userOne joins
            $browser1->visit(route('room', ['roomId' => $roomUuid]))
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name);

            // userTwo joins
            $browser2->visit(route('room', ['roomId' => $roomUuid]))
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
            $this->assertEquals('3.0', $text);
        });
    }

    #[Test]
    public function users_can_change_vote_before_reveal(): void
    {
        $roomUuid = $this->room->uuid;

        $users = $this->user;

        $this->browse(function (Browser $browser1, Browser $browser2) use ($roomUuid, $users): void {
            $userOne = $users->get(0);

            $userTwo = $users->get(1);

            // userOne joins
            $browser1->visit(route('room', ['roomId' => $roomUuid]))
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name);

            // userTwo joins
            $browser2->visit(route('room', ['roomId' => $roomUuid]))
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
            $this->assertEquals('3.0', $text);
        });
    }
}
