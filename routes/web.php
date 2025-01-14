<?php

use App\Livewire\GameComponent;
use App\Livewire\GameDetail;
use App\Livewire\Games;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;



//Route::view('/', 'welcome');
Route::redirect('/', 'dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/game/{id}', GameDetail::class)
    ->middleware(['auth'])
    ->name('game.detail');

require __DIR__ . '/auth.php';
