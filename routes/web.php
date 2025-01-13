<?php

use App\Livewire\GameComponent;
use App\Livewire\GameDetails;
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


require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::resource('videogames', GameController::class);
});

