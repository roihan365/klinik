<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Daftarkan middleware Spatie di sini
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
        ]);
        
        // Daftarkan middleware grup di sini (jika ada)
        // $middleware->web([
        //     \App\Http\Middleware\EncryptCookies::class,
        // ]);

        // Daftarkan middleware global di sini (jika ada)
        // $middleware->append(
        //     \App\Http\Middleware\LocaleMiddleware::class,
        // );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();