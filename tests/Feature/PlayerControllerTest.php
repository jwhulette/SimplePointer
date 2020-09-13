<?php

namespace Tests\Feature;

use App\Room;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_new_player_join()
    {
        $room = Room::factory()->create();

        $user = User::factory()->make([
            'room_id' => $room->uuid,
        ]);

        $response = $this->put(route('join'), [
            'name' => $user->name,
            'type' => 1,
            'roomid' => $user->room_id,
        ]);

        $response->assertStatus(200);

        $this->assertTrue(is_array($response['user']));

        $this->assertTrue(Auth::check());
    }

    public function test_existing_player_join()
    {
        $room = Room::factory()->create();

        $user = User::factory()->create([
            'room_id' => $room->uuid,
        ]);

        $response = $this->put(route('join'), [
            'userid' => $user->id,
            'name' => $user->name,
            'type' => 1,
            'roomid' => $user->room_id,
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $user->id,
            'name' => $user->name,
            'type' => 1,
            'room_id' => $user->room_id,
        ]);

        $this->assertTrue(Auth::check());
    }
}
