<?php

namespace App\Ship\Monitoring\ActivityLog\Helpers;

use Error;
use Exception;
use Throwable;
use App\Ship\Enums\LogLevelEnums;
use App\Ship\Monitoring\ActivityLog\Notifications\ExceptionNotificationLog;
use App\Ship\Monitoring\ActivityLog\TransformerTraits\TaskErrorLogTransformer;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Contracts\Activity;


/**
 * Error Logger
 * 
 * This class called for logging and activity logging for error.
 * Its purpose is for logging custom error using try-catch and put it  on activity logging 
 * 
 */
class ErrorLogger
{
    use TaskErrorLogTransformer;

    public static function emergency(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::EMERGENCY, $errorLogs, $activity, $logs);


        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::EMERGENCY;
            })
            ->log($logs);
    }

    public static function alert(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::ALERT, $errorLogs, $activity, $logs);

        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::ALERT;
            })
            ->log($logs);
    }

    public static function critical(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::CRITICAL, $errorLogs, $activity, $logs);

        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::CRITICAL;
            })
            ->log($logs);
    }

    public static function error(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::ERROR, $errorLogs, $activity, $logs);

        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::ERROR;
            })
            ->log($logs);
    }

    public static function warning(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::WARNING, $errorLogs, $activity, $logs);

        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::WARNING;
            })
            ->log($logs);
    }

    public static function notice(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::NOTICE, $errorLogs, $activity, $logs);

        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::NOTICE;
            })
            ->log($logs);
    }

    public static function info(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        if($LaravelLog === true){
            Log::info($errorLogs,["activity"=>$activity,"logs"=>$logs]);
        }

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::INFORMATIONAL, $errorLogs, $activity, $logs);

        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::INFORMATIONAL;
            })
            ->log($logs);
    }

    public static function debug(string $activity, string $logs, string $className, Error|Exception|Throwable $errorClass, array|string $additional = null ,bool $LaravelLog = true)
    {
        $errorLogs = TaskErrorLogTransformer::TransformErrorLog($className, $errorClass, $additional);

        ExceptionNotificationLog::notifyException($errorClass,LogLevelEnums::DEBUG, $errorLogs, $activity, $logs);
        
        activity($activity)
            ->withProperties($errorLogs)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::DEBUG;
            })
            ->log($logs);
    }
}