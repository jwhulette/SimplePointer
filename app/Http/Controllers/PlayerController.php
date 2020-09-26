<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Create or update the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Create or update the user based on the user uuid
        try {
            $user = User::updateOrCreate(
                [
                    'id' => $request->userid,
                ],
                [
                    'name' => $request->name,
                    'type' => $request->type,
                    'room_id' => Uuid::fromString($request->roomid),
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(['Unable to create player!'], 500);
        }

        // Automatically log the user in
        Auth::login($user);

        return response()->json(['user' => $user]);
    }
}
