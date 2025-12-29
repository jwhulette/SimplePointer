<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\ClearVotesEvent;
use App\Events\ShowVotesEvent;
use App\Events\UserVoted;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class VotesController extends Controller
{
    public function vote(Request $request): JsonResponse
    {
        try {
            event(
                new UserVoted(
                    $request->string('roomid')->toString(),
                    $request->integer('userid'),
                    $request->integer('vote')
                )
            );

            return response()->json(['success']);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json(['error'], 500);
    }

    public function show(Request $request): JsonResponse
    {
        try {
            event(
                new ShowVotesEvent(
                    $request->string('roomid')->toString()
                )
            );

            return response()->json(['success']);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json(['error'], 500);
    }

    public function clear(Request $request): JsonResponse
    {
        try {
            event(
                new ClearVotesEvent(
                    $request->string('roomid')->toString()
                )
            );

            return response()->json(['success']);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json(['error'], 500);
    }
}
