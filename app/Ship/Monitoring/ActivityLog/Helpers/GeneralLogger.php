<?php

namespace App\Ship\Monitoring\ActivityLog\Helpers;

use App\Ship\Enums\LogLevelEnums;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Contracts\Activity;

/**
 * General Logger
 * 
 * This class called for activity logging instead of error.
 * Its purpose is for logging some activity with additional logging using laravel Syslog Level (RFC 5424) 
 * 
 */
class GeneralLogger
{
    public static function emergency(string $activity, string $logs, array|string $properties,bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::emergency($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::EMERGENCY;
            })
            ->log($logs);
    }

    public static function alert(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::alert($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::ALERT;
            })
            ->log($logs);
    }

    public static function critical(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::critical($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::CRITICAL;
            })
            ->log($logs);
    }

    public static function error(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::error($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::ERROR;
            })
            ->log($logs);
    }

    public static function warning(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::warning($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::WARNING;
            })
            ->log($logs);
    }

    public static function notice(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::notice($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::NOTICE;
            })
            ->log($logs);
    }

    public static function info(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::info($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::INFORMATIONAL;
            })
            ->log($logs);
    }

    public static function debug(string $activity, string $logs, array|string $properties, bool $LaravelLog = true)
    {
        if($LaravelLog === true){
            Log::debug($properties,["activity"=>$activity,"logs"=>$logs]);
        }

        activity($activity)
            ->withProperties($properties)
            ->tap(function(Activity $activity) {
                $activity->log_level = LogLevelEnums::DEBUG;
            })
            ->log($logs);
    }
}