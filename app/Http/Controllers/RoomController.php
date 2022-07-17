<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Ramsey\Uuid\Uuid;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(RoomRequest $request): RedirectResponse
    {
        // Generate new room UUID
        $roomUuid = Uuid::uuid1()->toString();

        // Add the new room
        Room::create([
            'uuid' => $roomUuid,
            'name' => $request->name,
            'card_id' => $request->card_set,
        ]);

        // Redirect to the created room
        return redirect()->route('room', ['roomId' => $roomUuid]);
    }

    /**
     * Show the room.
     *
     * @param string $roomId
     * @return \Illuminate\View\View.
     */
    public function room(string $roomId): View
    {
        $room = Room::whereUuid($roomId)->with('cardSet')->firstOrFail();

        $routes = collect([
            'join' => route('join'),
            'player_list' => route('player_list'),
            'vote' => route('vote'),
            'show' => route('show'),
            'clear' => route('clear'),
        ]);

        return view('room', [
            'name' => $room->name,
            'cardset' => $room->cardSet?->card_set,
            'id' => $roomId,
            'routes' => $routes,
        ]);
    }
}
