<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            // You can return a custom 404 view or JSON response here

            if ($request->is('api/*')) {
                return sendError('Route not found.', [], 404);
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                return sendError('Method not allowed on this route.', [], 405);
            }

            return response()->view('errors.404', [], 404);
            // Or fallback to default:
            // return parent::render($request, $exception);
        }

        return parent::render($request, $exception); // Always handle other exceptions
    }

}
