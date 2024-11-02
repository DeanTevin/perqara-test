<?php

namespace App\Containers\AppSection\User\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException as ParentException;
use Symfony\Component\HttpFoundation\Response;

class EmailNotVerifiedHttpException extends ParentException
{
    public function __construct(int $statusCode = Response::HTTP_FORBIDDEN, 
    string $message = 'User Email Not Verified.', 
    ?\Throwable $previous = null, 
    int $code = 0, array 
    $headers = [])
    {
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }

}
