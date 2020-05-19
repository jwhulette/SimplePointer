<?php

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

Broadcast::channel('room{id}', function ($user, $id) {
    if ($user->room_id === $id) {
        return ['userid' => $user->id, 'name' => $user->name, 'type' => $user->type, 'voted' => false, 'vote' => null];
    }
});
