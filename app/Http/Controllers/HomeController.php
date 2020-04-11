<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(): View
    {
        $cards = Cache::rememberForever('card_sets', function () {
            return Card::all();
        });

        return view('home', ['cards' => $cards]);
    }
}
