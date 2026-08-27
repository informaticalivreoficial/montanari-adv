<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middleware aliases (substitui $routeMiddleware do Kernel)
        $middleware->alias([
            'client' => \App\Http\Middleware\ClientArea::class,
            'admin.access' => \App\Http\Middleware\EnsureAdminAccess::class,
        ]);

        // Redirect se não autenticado (substitui Authenticate middleware)
        $middleware->redirectGuestsTo(function () {
            return route('login');
        });

        // Redirect se autenticado (substitui RedirectIfAuthenticated middleware)
        $middleware->redirectUsersTo(function () {
            $user = \Illuminate\Support\Facades\Auth::user();
            if ($user && $user->hasRole('client')) {
                return route('client.dashboard');
            }
            return route('dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
