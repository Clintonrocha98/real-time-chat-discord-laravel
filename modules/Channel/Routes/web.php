<?php

use Modules\Channel\Http\Controller\ChannelController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'web'])->prefix('guilds')->group(function () {
  Route::get('/{guild_id}', [ChannelController::class, 'getChannels'])->name('channels.show');

  Route::prefix('/{guild_id}/channels')->group(function () {
    Route::post('/', [ChannelController::class, 'postChannel'])->name('channel.store');
    Route::delete('/{channel_id}', [ChannelController::class, 'deleteChannel'])->name('channel.destroy');
  });
});



