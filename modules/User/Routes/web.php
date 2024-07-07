<?php
use Modules\User\Http\Controller\RegisteredUserController;
use Modules\User\Http\Controller\SessionUserController;

Route::middleware(['guest', 'web'])->group(function () {
  Route::get('/register', [RegisteredUserController::class, 'getRegisteredView']);
  Route::post('/register', [RegisteredUserController::class, 'postRegistered']);
  Route::get('/login', [SessionUserController::class, 'getSessionUserView'])->name('login');
  Route::post('/login', [SessionUserController::class, 'postSessionUser']);
});

Route::middleware(['auth', 'web'])->group(function () {
  Route::get('/logout', [SessionUserController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
  return auth()->check() ? redirect('/guilds') : redirect('/login');
});