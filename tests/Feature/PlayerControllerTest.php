<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PlayerControllerTest extends TestCase
{
    #[Test]
    public function new_player_join(): void
    {
        $room = Room::factory()->create();

        $user = User::factory()->make([
            'room_id' => $room->uuid,
        ]);

        $response = $this->put(route('join'), [
            'name'   => $user->name,
            'type'   => 1,
            'roomid' => $user->room_id,
        ]);

        $response->assertStatus(200);

        $this->assertTrue(is_array($response['user']));

        $this->assertTrue(Auth::check());
    }

    #[Test]
    public function existing_player_join(): void
    {
        $room = Room::factory()->create();

        $user = User::factory()->create([
            'room_id' => $room->uuid,
        ]);

        $response = $this->put(route('join'), [
            'userid' => $user->id,
            'name'   => $user->name,
            'type'   => 1,
            'roomid' => $user->room_id,
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id'      => $user->id,
            'name'    => $user->name,
            'type'    => 1,
            'room_id' => $user->room_id,
        ]);

        $this->assertTrue(Auth::check());
    }
}
