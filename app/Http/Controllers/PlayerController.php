<?php

namespace App\Http\Controllers;

use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Create or update the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create or update the user based on the user uuid
        try {
            $user = User::updateOrCreate(
                ['id' => $request->userid],
                [
                    'name' => $request->name,
                    'type' => $request->type,
                    'room_id' => Uuid::fromString($request->roomid),
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response('Unable to create player!', 500);
        }

        // Automatically log the user in
        Auth::login($user);

        return response()->json(['user' => $user]);
    }
}
