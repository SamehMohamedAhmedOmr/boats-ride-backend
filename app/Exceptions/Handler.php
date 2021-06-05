<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();
            $first_error = collect($errors)->first();
            $message = ($first_error) ? $first_error[0] : $exception->getMessage();
            $code = 422;
        } elseif ($exception instanceof AuthenticationException) {
            $message = 'Unauthenticated';
            $code = 401;
            $errors = [
                'token' => [$exception->getMessage()]
            ];
        } elseif ($exception instanceof ModelNotFoundException) {
            $message = 'Not Found';
            $code = 404;
            $errors = [
                'route' => ['url is not found']
            ];
        } elseif ($exception instanceof NotFoundHttpException) {
            $message = 'Not Found';
            $code = 404;
            $errors = [
                'route' => ['url is not found']
            ];
        }
        elseif ($exception instanceof UnauthorizedException) {
            $message = $exception->getMessage();
            $code = 403;
            $errors = [
                'unauthorized' => [$exception->getMessage()]
            ];
        }
        else {
            $code = 400;
            $message = $exception->getMessage();
            $errors = [
                'failed'=>['Something Went Wrong']

            ];
        }
        if (env('APP_DEBUG')) {
            if ($code == 404) {
                $errors = [
                    'route' => [$exception->getMessage()]
                ];
            }
            if ($code != 422){
                $errors['line'] = $exception->getLine();
                $errors['trace'] = $exception->getTrace();
            }
        }

        return response()->json([
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

}
