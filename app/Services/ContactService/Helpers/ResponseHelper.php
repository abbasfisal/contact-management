<?php

namespace App\Services\ContactService\Helpers;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class ResponseHelper
{
    public const STATUS_OK = 200;
    public const STATUS_CREATED = 201;
    public const STATUS_DELETED = 204;
    public const STATUS_BAD_REQUEST = 400;
    public const STATUS_UNAUTHORIZED = 401;
    public const STATUS_PAYMENT_REQUIRED = 402;
    public const STATUS_FORBIDDEN = 403;
    public const STATUS_NOT_FOUND = 404;
    public const STATUS_METHOD_NOT_ALLOWED = 405;
    public const STATUS_METHOD_NOT_ACCEPTABLE = 406;
    public const STATUS_PROXY_AUTHENTICATION_REQUIRED = 407;
    public const STATUS_REQUEST_TIMEOUT = 408;
    public const STATUS_CONFLICT = 409;
    public const STATUS_GONE = 410;
    public const STATUS_LENGTH_REQUIRED = 411;
    public const STATUS_UNPROCESSABLE_ENTITY = 422;
    public const STATUS_TOO_MANY_REQUESTS = 429;
    public const STATUS_SERVER = 500;

    public static function respond($data = [], $messages = [], int $statusCode = self::STATUS_OK, $meta = []): JsonResponse
    {
        if (isset($data['meta']) && isset($data['data'])) {
            $meta = array_merge($data['meta'], $meta);
            $data = $data['data'];
        }

        return Response::json(
            [
                'messages' => $messages,
                'data'     => $data,
                'meta'     => $meta,
            ],
            $statusCode
        );
    }


    public static function success($data = [], $messages = [], int $statusCode = self::STATUS_OK, $meta = []): JsonResponse
    {

        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'success',
                'text' => __('szk::response.success')
            ];
        }

        return self::respond(
            $data,
            $messages,
            $statusCode,
            $meta
        );
    }

    public static function retrieved($data, $messages = [], int $statusCode = self::STATUS_OK, $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'info',
                'text' => __('szk::response.retrieved')
            ];
        }

        return self::respond(
            $data,
            $messages,
            $statusCode,
            $meta
        );
    }

    public static function created($data, $messages = [], int $statusCode = self::STATUS_CREATED, $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'success',
                'text' => __('szk::response.created')
            ];
        }

        return self::respond(
            $data,
            $messages,
            $statusCode,
            $meta
        );
    }

    public static function updated($data, $messages = [], int $statusCode = self::STATUS_OK, $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'success',
                'text' => __('szk::response.updated')
            ];
        }

        return self::respond(
            $data,
            $messages,
            $statusCode,
            $meta
        );
    }

    public static function deleted($data = [], $messages = [], int $statusCode = self::STATUS_OK, $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'info',
                'text' => __('szk::response.deleted')
            ];
        }

        return self::respond(
            $data,
            $messages,
            $statusCode,
            $meta
        );
    }

    public static function info($messages, int $statusCode = self::STATUS_OK, $meta = []): JsonResponse
    {
        $responseMessages = [];
        foreach ($messages as $message) {
            $responseMessages[] = [
                'type'    => 'info',
                'message' => $message
            ];
        }

        return self::respond(
            [],
            $responseMessages,
            $statusCode,
            $meta
        );
    }

    public static function error($messages = [], int $statusCode = self::STATUS_BAD_REQUEST, $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'error',
                'text' => __('szk::response.error')
            ];
        }

        return self::respond(
            [],
            $messages,
            $statusCode,
            $meta
        );
    }

    public static function notFound($messages = [], $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'error',
                'text' => __('szk::response.notFound')
            ];
        }
        return self::error(
            $messages,
            self::STATUS_NOT_FOUND,
            $meta
        );
    }

    public static function unauthorized($messages = [], $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'error',
                'text' => __('szk::response.unauthorized')
            ];
        }
        return self::error(
            $messages,
            self::STATUS_UNAUTHORIZED,
            $meta
        );
    }

    public static function forbidden($messages = [], $meta = []): JsonResponse
    {
        if (count($messages) == 0) {
            $messages[] = [
                'type' => 'error',
                'text' => __('szk::response.forbidden')
            ];
        }
        return self::error(
            $messages,
            self::STATUS_FORBIDDEN,
            $meta
        );
    }

    public static function unprocessable($message = []): JsonResponse
    {
        $index = 0;
        $myError = null;
        foreach ($message as $key => $value) {
            $myError[$index]['field'] = $key;
            $myError[$index]['message'] = $value;
            $index++;
        }

        return self::respond(
            [
                'details' => $myError
            ],
            [
                [
                    'type' => 'error',
                    'text' => __('szk::response.unprocessable')
                ]
            ],
            self::STATUS_UNPROCESSABLE_ENTITY
        );
    }
}
