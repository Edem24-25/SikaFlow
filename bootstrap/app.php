<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Middleware\EnsurePhoneIsVerified;
use Illuminate\Http\Middleware\HandleCors;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => EnsureUserIsAdmin::class,
            'phone.verified' => EnsurePhoneIsVerified::class,
        ]);
        $middleware->redirectGuestsTo(fn () => route('login'));
        $middleware->redirectUsersTo(fn () => route('dashboard'));
        $middleware->preventRequestsDuringMaintenance([
            'secret' => env('APP_MAINTENANCE_SECRET'),
        ]);
        $middleware->validateCsrfTokens(except: [
            'paiement/kkiapay/webhook',
        ]);
        $middleware->trustProxies(at: '*');
        //$middleware->forceHttps();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json(['message' => 'Ressource non trouvée.'], 404);
            }
            return response()->view('errors.404', [], 404);
        });
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException $e, $request) {
            return response()->view('errors.403', [], 403);
        });
        $exceptions->renderable(function (\Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException $e, $request) {
            return response()->view('errors.429', [], 429);
        });
        $exceptions->render(function (\Throwable $e, $request) {
            return response()->view('errors.500', [], 500);
        });
    })->create();
