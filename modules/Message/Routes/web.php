<?php

use Modules\Message\Http\Controller\MessageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->prefix('guilds/{guild_id}/channels')->group(function () {
  Route::get('/{channel_id}', [MessageController::class, 'getMessages'])->name('messages.show');
  Route::post('/{channel_id}/message', [MessageController::class, 'postMessage'])->name('message.store');
});
