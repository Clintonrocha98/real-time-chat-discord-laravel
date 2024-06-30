<?php

use App\Http\Controllers\API\PostMessageController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);

    });
    
    
    Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy']);
    
    Route::get('/guilds', [GuildController::class, 'index']);
    Route::post('/guilds', [GuildController::class, 'store']);

    //n implementei ainda
    Route::delete('/guilds/{guild:guild_id}', [GuildController::class, 'destroy']);
    //falta conseguir apagar um canal
    Route::get('/guilds/{guild_id}', [ChannelController::class, 'index'])->name('guilds.show');
    Route::post('/guilds/{guild_id}/channels', [ChannelController::class, 'store'])->name('channels.store');

    //falta conseguir apagar uma mensagem
    Route::get('/guilds/{guild_id}/channels/{channel_id}', [MessageController::class, 'getMessages'])->name('messages.show');
    Route::post('/guilds/{guild_id}/channels/{channel_id}/message', [PostMessageController::class, 'postMessage']);
});



