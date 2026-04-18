<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SequelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     Route::prefix("profile_game")->name("profile.game.")->controller(GameController::class)->middleware('auth')->group(function(){
        Route::get('/index','homepage')->name('homepage');
        Route::get('/create','create')->name('new'); 
        Route::post('/add','add')->name('add');
        Route::get('{game}/edit','edit')->name('edit');
        Route::put('{game}/update','update')->name('update'); 
        Route::delete('{game}/delete','delete')->name('delete');
    });

    Route::prefix("game_sequel")->name("game.sequel.")->controller(SequelController::class)->middleware('auth')->group(function(){
    Route::get('{game}/index','index')->name('homepage');
    Route::get('{game}/create','create')->name('new');
    Route::post('{game}/save','save')->name('save');
    });
}); 

 

require __DIR__.'/auth.php';
