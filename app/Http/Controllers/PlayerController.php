<?php

namespace App\Http\Controllers;

use App\Player;
use App\Events\UserJoined;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlayerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Player::create([
                'name' => $request->name,
                'type' => $request->type,
                'room_id' => $request->roomid,
            ]);
        } catch (\Throwable $th) {
            return response('Unable to create player!', 500);
        }

        // Dispatch the user joined event
        event(new UserJoined($request->roomid));

        return response('success');
    }
}
