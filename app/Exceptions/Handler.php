<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => $exception->getMessage(),
                'status' => $exception->getCode() ?: 500
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
