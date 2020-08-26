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
use Illuminate\Foundation\Testing\RefreshDatabase;

class VotesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_votes_route()
    {
        $room = factory(Room::class)->create();

        $user = factory(User::class)->create([
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

        $response = $this->put(route('show'), [
                'roomid'=> Str::uuid(),
            ]);

        $response->assertStatus(200);

        Event::assertDispatched(ShowVotesEvent::class);
    }

    public function test_clear_votes_route()
    {
        Event::fake();

        $response = $this->put(route('clear'), [
                'roomid'=> Str::uuid(),
            ]);

        $response->assertStatus(200);

        Event::assertDispatched(ClearVotesEvent::class);
    }
}
