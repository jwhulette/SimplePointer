<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cards = Card::all();

        return view('home', ['cards' => $cards]);
    }
}
