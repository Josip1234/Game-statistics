<?php

use App\Http\Middleware\CheckStoredValuesGameGEnre;
use App\Http\Middleware\ForgetFileSessionForRoute;
use App\Http\Middleware\RememberPreviousUrl;
use App\Http\Middleware\StorageCleanup;
use App\Http\Middleware\ValidateFileInput;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'file.validate'=>ValidateFileInput::class,
            'remember.url'=>RememberPreviousUrl::class,
            'storage.cleanup'=>StorageCleanup::class, 
            'forget.file.session'=>ForgetFileSessionForRoute::class,
            'check.stored.value.game_genre'=>CheckStoredValuesGameGEnre::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
