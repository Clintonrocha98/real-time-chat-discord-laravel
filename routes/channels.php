<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
Broadcast::routes(['middleware' => ['auth']]);

Broadcast::channel('room.{channel_id}', function (User $user, $user_id) {
    return $user->id === Auth::id();
});