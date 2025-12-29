<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Events\ClearVotesEvent;
use App\Events\ShowVotesEvent;
use App\Events\UserVoted;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class VotesControllerTest extends TestCase
{
    #[Test]
    public function user_votes_route(): void
    {
        $room = Room::factory()->create();

        $user = User::factory()->create([
            'room_id' => $room->uuid,
        ]);

        Event::fake();

        $response = $this->put(route('vote'), [
            'roomid' => $room->uuid,
            'userid' => $user->id,
            'vote'   => 3,
        ]);

        $response->assertStatus(200);

        Event::assertDispatched(UserVoted::class);
    }

    #[Test]
    public function show_votes_route(): void
    {
        Event::fake();

        $room = Room::factory()->create();

        $response = $this->put(route('show'), [
            'roomid' => $room->uuid,
        ]);

        $response->assertStatus(200);

        Event::assertDispatched(ShowVotesEvent::class);
    }

    #[Test]
    public function clear_votes_route(): void
    {
        Event::fake();

        $room = Room::factory()->create();

        $response = $this->put(route('clear'), [
            'roomid' => $room->uuid,
        ]);

        $response->assertStatus(200);

        Event::assertDispatched(ClearVotesEvent::class);
    }
}
