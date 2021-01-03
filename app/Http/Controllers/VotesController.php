<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\UserVoted;
use Illuminate\Http\Request;
use App\Events\ShowVotesEvent;
use App\Events\ClearVotesEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class VotesController extends Controller
{
    /**
     * Record a users vote.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function vote(Request $request): JsonResponse
    {
        try {
            event(new UserVoted($request->roomid, $request->userid, (int) $request->vote));

            return response()->json(['success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json(['error'], 500);
    }

    /**
     * Show the votes.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        try {
            event(new ShowVotesEvent($request->roomid));

            return response()->json(['success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json(['error'], 500);
    }

    /**
     * Clear the user votes.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function clear(Request $request): JsonResponse
    {
        try {
            event(new ClearVotesEvent($request->roomid));

            return response()->json(['success']);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json(['error'], 500);
    }
}
