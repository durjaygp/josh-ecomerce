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
//
//Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});
//
//Broadcast::channel('chat.{support_id}', function ($user, $support_id) {
//    return (int) $user->id === (int) $id;
//});
//Broadcast::channel('chat.{support_id}', function ($user, $support_id) {
//    return true; // Add your own logic here if needed
//});

Broadcast::channel('chat.{support_id}', function ($user, $support_id) {
    return true; // Allow all authenticated users access (use this only for testing)
});
