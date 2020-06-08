<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VotesController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'about')->name('about');

Route::view('/what-is-planning-poker', 'what')->name('what');

Route::view('/terms', 'terms')->name('terms');

Route::view('/why-ads', 'ads')->name('ads');

Route::post('/room', [RoomController::class, 'index'])->name('rooms_index');

Route::get('/{roomId}/room', [RoomController::class, 'room'])->name('room');

Route::put('/join', [PlayerController::class, 'store'])->name('join');

Route::get('/list/{roomid?}', [PlayerController::class, 'list'])->name('player_list');

Route::put('/vote', [VotesController::class, 'vote'])->name('vote');

Route::put('/show', [VotesController::class, 'show'])->name('show');

Route::put('/clear', [VotesController::class, 'clear'])->name('clear');
