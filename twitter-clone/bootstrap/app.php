<?php

use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\LangMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->alias([
        //     'admin' => EnsureUserIsAdmin::class
        // ]);

        //ასე შეგვიძლია დიფოლტ web da api middleware-ზე დავამატოთ სხვა დამატებითი middleware.
        $middleware->web(append: [
            LangMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
