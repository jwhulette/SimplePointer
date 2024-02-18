<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $cards = Cache::rememberForever('cards', fn () => Card::all());

        return view('home', ['cards' => $cards]);
    }
}
