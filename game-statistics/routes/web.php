<?php

use App\Http\Controllers\AdStatisticsController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameProfileController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MDetailController;
use App\Http\Controllers\ModificationController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SequelController;
use App\Http\Controllers\SequelProfileController;
use App\Http\Controllers\StatisticsController;
use App\Models\Modification;
use App\Services\GameService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','storage.cleanup','forget.file.session'])->name('dashboard');

Route::get('/json',function(){
    $gs = new GameService();
     $gs->set(['ime','prezime'],['jobo','našao posao'],"neka_datoteka","neki url");
    //return "Game service";
    return $gs->returnJsonKeyValues();
})->middleware('auth');

Route::middleware(['auth','forget.file.session'])->group(function () {
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
        Route::get('/new','create')->name('create');
        Route::post('/store','store')->name('store'); 
        Route::get('{platform}/edit','edit')->name('edit');
        Route::put('{platform}/update','update')->name('update');
        Route::delete('{platform}/delete','delete')->name('delete');
    });
   Route::prefix("game_profile")->name('game.profile.')->controller(GameProfileController::class)->middleware('auth')->group(function(){
        Route::get('{game}/index','gpindex')->name('index');
        Route::get('{game}/create','gpcreate')->name('create'); 
        Route::post('{game}/store','gpstore')->name('store');
        Route::get('{game}/{profile}/edit','gpedit')->name('edit'); 
        Route::put('{game}/{profile}/update','gpupdate')->name('update'); 
        Route::delete('{game}/{profile}/delete','gpdelete')->name('delete');
   });

    Route::prefix("sequel_profile")->name('sequel.profile.')->controller(SequelProfileController::class)->middleware('auth')->group(function(){
        Route::get('{game}/{sequel}/index','spindex')->name('index');
        Route::get('{game}/{sequel}/create','spcreate')->name('create'); 
        Route::post('{game}/{sequel}/store','spstore')->name('store');
        Route::get('{game}/{sequel}/{profile}/edit','spedit')->name('edit'); 
        Route::put('{game}/{sequel}/{profile}/update','spupdate')->name('update'); 
        Route::delete('{game}/{sequel}/{profile}/delete','spdelete')->name('delete');
   });
   Route::prefix("game_seq_modification")->name('game.sequel.modifications.')->controller(ModificationController::class)->middleware(['auth'])->group(function(){
        Route::get('{game}/{sequel}/index','seqIndex')->name("seqIndex")->middleware('remember.url');
        Route::get('{game}/index','index')->name('index')->middleware('remember.url');
        Route::get('{game}/{sequel}/create','seqCreate')->name("seqCreate");
        Route::get('{game}/create','create')->name("create"); 
        Route::post('{game}/store','store')->name("store");
        Route::post('{game}/{sequel}/store','seqStore')->name("seqStore"); 
        Route::get('{game}/{modification}/edit','edit')->name('edit');
        Route::get('{game}/{sequel}/{modification}/edit','seqEdit')->name('seqEdit');
        Route::put('{game}/{modification}/update','update')->name('update');
        Route::put('{game}/{sequel}/{modification}/update','seqUpdate')->name('seqUpdate');
        Route::delete('{game}/{modification}/delete','delete')->name('delete');
        Route::delete('{game}/{sequel}/{modification}/delete','seqDelete')->name('seqDelete');

   });
   Route::prefix("modification_details")->name('modification.details.')->controller(MDetailController::class)->middleware(['auth','forget.file.session'])->group(function(){
        Route::get('{modification}/index','index')->name('index')->middleware('remember.url');
        Route::get('{modification}/create','create')->name('create');
        Route::post('{modification}/store','store')->name('store');
        Route::get('{modification}/{mdetail}/edit','edit')->name('edit');
        Route::put('{modification}/{mdetail}/update','update')->name('update');
        Route::delete('{modification}/{mdetail}/delete','delete')->name('delete');
   });
  Route::prefix("advanced_statistics")->name('advanced.statistics.')->controller(AdStatisticsController::class)->middleware(['auth'])->group(function(){
        Route::get('{game}/{statistics}/jkeyval','gkeyval')->name('json_data');
        Route::get('{sequel}/{statistics}/skeyval','skeyval')->name('sjson_data');
        Route::post('{sequel}/{statistics}/save','ssave_to_json')->name('seq_json');
        Route::post('{game}/{statistics}/saveg','gsave_to_json')->name('gam_json'); 
        Route::get('{statistics}/index','index')->name('adhomepage');
        Route::get('{statistics}/create','create')->name('adcreate');
        Route::post('{statistics}/store','store')->name('adstore');
        Route::get('{statistics}/{adstat}/edit','edit')->name('adedit');
        Route::put('{statistics}/{adstat}/update','update')->name('adupdate');
        Route::delete('{statistics}/{adstat}/delete','delete')->name('addelete');
        Route::get('{statistics}/{adstat}/jdindex','readJsonData')->name('readJData'); 
      
  });

}); 

 

require __DIR__.'/auth.php';
