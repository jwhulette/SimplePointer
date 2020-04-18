<?php

use App\Player;
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

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('room.{roomId}', function ($user, $roomId) {
//     return ['name' => 'palyer'];
//     // return Player::whereUuid($roomId, 'room_id')->get()->toArray();
//     // if ($user->canJoinRoom($roomId)) {
//     //     return ['id' => $user->id, 'name' => $user->name];
//     // }
// });

Broadcast::channel('room', function ($user, $id) {
    return true;
});
