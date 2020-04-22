<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\UserJoined;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
            $user = User::create([
                'name' => $request->name,
                'type' => (int) $request->type,
                'room_id' => $request->roomid,
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response('Unable to create player!', 500);
        }

        // Auth::login($user);

        // Dispatch the user joined event
        event(new UserJoined($request->roomid));

        return response('success');
    }
}
