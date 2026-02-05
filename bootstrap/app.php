<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\HomeMiddleware;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'home'=>HomeMiddleware::class,
            'role' => RoleMiddleware::class,
            'customer' =>CustomerMiddleware::class,
            'user' =>UserMiddleware::class,
            'admin' =>AdminMiddleware::class,
            ]);

            
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
