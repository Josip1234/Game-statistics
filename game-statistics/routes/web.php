<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SequelController;
use App\Http\Controllers\StatisticsController;
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
            Route::get('{game}/{sequel}/edit','edit')->name('edit');
            Route::put('{game}/{sequel}/update','update')->name('update');
            Route::delete('{game}/{sequel}/delete','delete')->name('delete');
    });

    Route::prefix("sequel_stat")->name("sequel.statistics.")->controller(StatisticsController::class)->middleware('auth')->group(function(){
         Route::get('{sequel}/index','seqIndex')->name('seqHomepage');
         Route::get('{sequel}/create','seqNew')->name('seqCreate'); 
         Route::post('{sequel}/save','seqSave')->name('seqSave');
         Route::get('{sequel}/{statistics}/seqEdit','seqEdit')->name('seqEdit');
         Route::put('{sequel}/{statistics}/seqStore','seqStore')->name('seqStore');
         Route::delete('{sequel}/{statistics}/seqDelete','seqDelete')->name('seqDelete');
    }); 
    Route::prefix("game_stat")->name('game.statistics.')->controller(StatisticsController::class)->middleware('auth')->group(function(){
        Route::get('{game}/index','gamStIndex')->name('gamStIndex');
        Route::get('{game}/create','gamStNew')->name('gamStNew');
        Route::post('{game}/save','gamSave')->name('gamSave');
        Route::get('{game}/{statistics}/gamEdit','gamEdit')->name('gamEdit');
        Route::put('{game}/{statistics}/gamStore','gamStore')->name('gamStore');
        Route::delete('{game}/{statistics}/gamDelete','gamDelete')->name('gamDelete');
    });
    Route::prefix("game_genre")->name('game.genre.')->controller(GenreController::class)->middleware('auth')->group(function(){
        Route::get('/index','genGmIndex')->name('genGmIndex');
        Route::get('/new','genNew')->name('genNew');
        Route::post('/store','genStore')->name('store');
        Route::get('{genre}/edit','genEdit')->name('genEdit');
        Route::put('{genre}/update','genUpdate')->name('genUpdate'); 
        Route::delete('{genre}/delete','genDelete')->name('genDelete');
    });
    Route::prefix("game_platform")->name('game.platform.')->controller(PlatformController::class)->middleware('auth')->group(function(){
        Route::get('/index','index')->name('index');
    });
  
}); 

 

require __DIR__.'/auth.php';
