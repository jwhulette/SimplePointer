<?php

namespace Tests\Feature;

use App\Room;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlayerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_player()
    {
        $room = factory(Room::class)->create();

        $user = factory(User::class)->make([
            'room_id' => $room->uuid,
        ]);

        $response = $this->put(route('join'), [
            'name' => $user->name,
            'type' => 1,
            'roomid' => $user->room_id,
        ]);

        $response->assertStatus(200);
    }
}
