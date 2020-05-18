<?php

namespace App\Http\Controllers;

use App\Events\UserVoted;
use Illuminate\Http\Request;
use App\Events\ShowVotesEvent;
use App\Events\ClearVotesEvent;
use Illuminate\Support\Facades\Log;

class VotesController extends Controller
{
    /**
     * Record a user vote.
     *
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request)
    {
        try {
            event(new UserVoted($request->roomid, $request->userid, $request->vote));

            return response()->json(['success']);
        } catch (\Throwable $th) {
            Log::error($th->getTrace());
        }

        return response()->json(['error'], 500);
    }

    /**
     * Show the votes.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function show(Request $request)
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
     */
    public function clear(Request $request)
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
