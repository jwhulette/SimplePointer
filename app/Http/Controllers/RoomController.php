<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(RoomRequest $request): RedirectResponse
    {
        // Generate new room UUID
        $roomUuid = Str::orderedUuid()->toString();

        // Add the new room
        Room::query()->create([
            'uuid'    => $roomUuid,
            'name'    => $request->name,
            'card_id' => $request->card_set,
        ]);

        // Redirect to the created room
        return to_route('room', ['roomId' => $roomUuid]);
    }

    public function room(string $roomId): View
    {
        $room = Room::whereUuid($roomId)->with('cardSet')->firstOrFail();

        $routes = collect([
            'join'        => route('join'),
            'player_list' => route('player_list'),
            'vote'        => route('vote'),
            'show'        => route('show'),
            'clear'       => route('clear'),
        ]);

        return view('room', [
            'name'    => $room->name,
            'cardset' => $room->cardSet?->card_set,
            'id'      => $roomId,
            'routes'  => $routes,
        ]);
    }
}
