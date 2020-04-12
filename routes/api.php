<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Limit all api calls to 20 calls per minute
Route::middleware('throttle:20,1')->prefix('v1')->group(function () {
    // Player routes
    Route::namespace('Player')->group(function () {
        Route::put('/player/join', [PlayerController::class, 'store'])->name('player_join');
        Route::get('/player/list', [PlayerController::class, 'index'])->name('player_list');
    });
});
