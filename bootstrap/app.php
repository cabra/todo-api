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
    ->withMiddleware(function (Middleware $middleware): void {
        // Здесь можно добавить глобальные middleware, если нужно
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Throwable $e, $request) {
            // Если запрос к API
            if ($request->is('api/*')) {
                // Валидация
                if ($e instanceof \Illuminate\Validation\ValidationException) {
                    return response()->json([
                        'errors' => $e->errors(),
                    ], 422);
                }

                // Любые другие исключения
                return response()->json([
                    'error' => $e->getMessage(),
                ], method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500);
            }

            // Для обычного web-запроса оставить стандартную обработку
            return null;
        });
    })
    ->create();
