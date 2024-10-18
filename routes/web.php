<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', PokedexController::class)
->name('pokedex');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('pokemon', PokemonController::class);
