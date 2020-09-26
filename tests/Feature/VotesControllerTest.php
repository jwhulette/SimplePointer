<?php

namespace Tests\Feature;

use App\Room;
use App\User;
use Tests\TestCase;
use App\Events\UserVoted;
use Illuminate\Support\Str;
use App\Events\ShowVotesEvent;
use App\Events\ClearVotesEvent;
use Illuminate\Support\Facades\Event;

/**
 * @group votes
 */
class VotesControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_user_votes_route()
    {
        $room = Room::factory()->create();

        $user = User::factory()->create([
            'room_id' => $room->uuid,
        ]);

        Event::fake();

        $response = $this->put(route('vote'), [
                'roomid'=> $room->uuid,
                'userid' => $user->id,
                'vote' => 3,
            ]);

        $response->assertStatus(200);

        Event::assertDispatched(UserVoted::class);
    }

    public function test_show_votes_route()
    {
        Event::fake();

        $room = Room::factory()->create();

        $response = $this->put(route('show'), [
                'roomid'=> $room->uuid,
            ]);

        $response->assertStatus(200);

        Event::assertDispatched(ShowVotesEvent::class);
    }

    public function test_clear_votes_route()
    {
        Event::fake();

        $room = Room::factory()->create();

        $response = $this->put(route('clear'), [
                'roomid'=> $room->uuid,
            ]);

        $response->assertStatus(200);

        Event::assertDispatched(ClearVotesEvent::class);
    }
}
