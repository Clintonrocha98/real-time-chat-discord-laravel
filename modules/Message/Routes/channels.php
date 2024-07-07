<?php

use Modules\Message\Broadcasting\JoinChat;
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => 'web']);

Broadcast::channel('room.{channel_id}', JoinChat::class);