<?php
namespace App\Ship\Monitoring\ActivityLog\Traits;

use Exception;


trait ErrorMorphTraits
{
    

    public function ErrorResponse(Exception $exception){
        $morph = [
            'error' => $exception->getMessage(),
            'code' => $exception->getCode(),
        ];

        return $morph;
    }
    
}