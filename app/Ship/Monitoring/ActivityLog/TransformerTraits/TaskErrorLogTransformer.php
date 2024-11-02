<?php
namespace App\Ship\Monitoring\ActivityLog\TransformerTraits;

use Error;
use Exception;
use Throwable;
use App\Containers\Payment\Inhealth\Traits\MorphCallResponseTrait;
use App\Ship\Parents\Requests\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;


/**
 * TaskErrorLogTransformer is a Transformer Trait for logging task errors.
 * 
 * This trait provides a method to transform task error information into a loggable format.
 * It includes details such as class name, error class, parent class, URL path, error message,
 * error code, and additional information.
 */
trait TaskErrorLogTransformer
{
    /**
     * Transform the task error log.
     *
     * @param string $className The name of the class where the error occurred.
     * @param Error|Exception|Throwable $errorClass The error class object.
     * @param string|array|null $additional Additional information related to the error (default: null).
     *
     * @return array The transformed error log values.
     */
    public static function TransformErrorLog(string $className, Error|Exception|Throwable $errorClass, string|array $additional = null)
    {  
        $LogValues = [
            'class' => $className,
            'errorClass' => get_class($errorClass),
            'type' => get_parent_class($errorClass),
            'urlPath' => FacadesRequest::getRequestUri(),
            'error' => [
                'errorMessage' => $errorClass->getMessage(),
                'code' => $errorClass->getCode()],
            'additional' => $additional
        ];

        return $LogValues;
    }
}