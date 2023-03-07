<?php

namespace App\Exceptions;

use App\Services\ContactService\Helpers\ResponseHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
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
        'current_password',
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
        $this->renderable(function (AuthorizationException $exception) {
            return ResponseHelper::unauthorized([],[
                'exception' => $exception
            ]);
        });

        $this->renderable(function (AccessDeniedHttpException $exception) {
            return ResponseHelper::unauthorized([],[
                'exception' => $exception
            ]);
        });

        $this->renderable(function (AuthenticationException $exception) {
            return ResponseHelper::forbidden([],[
                'exception' => $exception
            ]);
        });

        $this->renderable(function (ModelNotFoundException $exception) {
            return ResponseHelper::notFound(
                [
                    [
                        'type' => 'error',
                        'text' => __('handler.ModelNotFound')
                    ]
                ],[
                    'exception' => $exception
                ]
            );
        });

        $this->renderable(function (NotFoundHttpException $exception) {
            return ResponseHelper::notFound(
                [
                    [
                        'type' => 'error',
                        'text' => __('handler.NotFoundHttpException')
                    ]
                ],[
                    'exception' => $exception
                ]
            );
        });

        $this->renderable(function (MethodNotAllowedHttpException $exception) {
            return ResponseHelper::notFound(
                [
                    [
                        'type' => 'error',
                        'text' => __('handler.MethodNotAllowedHttpException')
                    ]
                ],[
                    'exception' => $exception
                ]
            );
        });

        $this->renderable(function (ValidationException $exception) {
            return ResponseHelper::unprocessable(
                $exception->errors()
            );
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
