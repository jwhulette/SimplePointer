<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class PlayerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Create or update the user based on the user uuid
        try {
            $user = User::query()->updateOrCreate([
                'id' => $request->userid,
            ], [
                'name'    => $request->name,
                'type'    => $request->type,
                'room_id' => $request->roomid,
            ]);
        } catch (Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(['Unable to create player!'], 500);
        }

        // Automatically log the user in
        Auth::login($user);

        return response()->json(['user' => $user]);
    }
}
