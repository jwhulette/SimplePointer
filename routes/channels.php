<?php

use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

    /*
        * Authenticate the user's personal channel...
        */
    Broadcast::channel('App.User.*', function ($user, $userId) {
        return true; // (int) $user->id === (int) $userId
    });

// Route::post('/guest/broadcast/auth/route', function () {
//     $user = new GenericUser(['id' => microtime()]);

//     request()->setUserResolver(function () use ($user) {
//         return $user;
//     });

//     return Broadcast::auth(request());
// });

// Broadcast::channel('room{id}', function ($user, $id) {
//     // return (int) $user->id === (int) $id;
//     return true;
// });

// Broadcast::channel('room.{roomId}', function ($user, $roomId) {
//     return ['user' => 'pointer'];
// });
