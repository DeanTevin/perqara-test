<?php

namespace App\Ship\Traits;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\App;
use RuntimeException;

Class ErrorResponseHelper
{
    public static function ExceptionResponse(Exception|RuntimeException $exception){
        $morph = [
            'environment' => App::environment(),
            'message' => $exception->getMessage(),
            'exception' => get_class($exception),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTrace(),
            'error' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ];

        return $morph;
    }

    public static function NullArrayResponse(){
        $morph = [
            'error' => "No Content",
            'code' => '204',
            'message' => "Empty Array Response"
        ];

        return $morph;
    }
}

