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

class JoinRoomTest extends DuskTestCase
{
    protected Room $room;

    /** @var Collection<int,User> */
    protected Collection $users;

    #[Override]
    public function setUp(): void
    {
        parent::setUp();

        /* @phpstan-ignore-next-line  */
        $this->room = Room::factory()->createOne();

        /* @phpstan-ignore-next-line  */
        $this->users = User::factory(3)->create([
            'room_id' => $this->room->uuid,
        ]);
    }

    #[Test]
    public function user_can_be_added_to_room(): void
    {
        $roomUuid = $this->room->uuid;

        $users = $this->users;

        $this->browse(function (Browser $browser1, Browser $browser2) use ($roomUuid, $users): void {
            /** @var User $userOne */
            $userOne = $users->get(0);

            /** @var User $userTwo */
            $userTwo = $users->get(1);

            $browser1->visit(route('room', ['roomId' => $roomUuid]))
                ->type('name', $userOne->name)
                ->press('Player')
                ->waitForText($userOne->name, 20)
                ->assertSee($userOne->name);

            $browser2->visit(route('room', ['roomId' => $roomUuid]))
                ->type('name', $userTwo->name)
                ->press('Player')
                ->waitForText($userTwo->name, 20)
                ->assertSee($userOne->name)
                ->assertSee($userTwo->name);
        });
    }
}
