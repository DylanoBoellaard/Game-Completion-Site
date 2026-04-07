<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Game progression tracking
// Route::get('/games', 'GameController@index')->name('games.index');
Route::get('games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', 'GameController@show')->name('games.show');