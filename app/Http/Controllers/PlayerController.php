<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response('hit', 405);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function show(Player $votes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $votes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $votes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $votes)
    {
        //
    }
}
