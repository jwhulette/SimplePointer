<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Card;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $cards = Cache::rememberForever('cards', function () {
            return Card::all();
        });

        return view('home', ['cards' => $cards]);
    }
}
