<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))

    // ->withRouting(
    //     commands: __DIR__.'/../routes/console.php',
    //     web: __DIR__.'/../routes/web.php',
    //     health: '/up',
    // )
    // ->withRouting(
    //     commands: __DIR__.'/../routes/console.php',
    //     web: __DIR__.'/../routes/web.php',
    //     health: '/up',
    //     then: function () {
    //         Route::middleware('web')
    //             ->prefix('admin')
    //             ->name('admin.')
    //             ->group(base_path('routes/admin.php'));
    //     },
    // )

    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        using: function () {
            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        },
    )

    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
 
        //
    })->create();
