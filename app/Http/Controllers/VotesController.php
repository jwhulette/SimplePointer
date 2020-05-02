<?php

namespace App\Http\Controllers;

use App\Events\UserVoted;
use Illuminate\Http\Request;
use App\Events\ShowVotesEvent;
use App\Events\ClearVotesEvent;

class VotesController extends Controller
{
    /**
     * Record a user vote.
     *
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request)
    {
        event(new UserVoted($request->roomid, $request->userid, (int) $request->vote));

        return response()->json(['success']);
    }

    /**
     * Show the votes.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function show(Request $request)
    {
        event(new ShowVotesEvent($request->roomid));

        return response()->json(['success']);
    }

    /**
     * Clear the user votes.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function clear(Request $request)
    {
        event(new ClearVotesEvent($request->roomid));

        return response()->json(['success']);
    }
}
