<?php

use Modules\Guild\Http\Controller\GuildController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'web'])->group(function () {
  Route::prefix('guilds')->group(function () {
    Route::get('/', [GuildController::class, 'getGuilds'])->name('guilds.show');
    Route::post('/', [GuildController::class, 'postGuild'])->name('guild.store');
    Route::delete('/{guild_id}', [GuildController::class, 'deleteGuild'])->name('guild.destroy');
  });

});