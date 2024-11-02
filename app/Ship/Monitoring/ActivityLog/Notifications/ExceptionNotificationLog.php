<?php

namespace App\Ship\Monitoring\ActivityLog\Notifications;

use Error;
use Exception;
use App\Ship\Notifications\MicrosoftTeams\ExceptionNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsChannel;

class ExceptionNotificationLog
{
    public static function notifyException(Exception|Error $e,$LogLevel, $errorLogs =null, $activity, $logs)
    {
        if(config('notification.microsoft_teams.error_log.enabled') == true)
        {
            Notification::route(MicrosoftTeamsChannel::class,null)->notify(new ExceptionNotification(null,$e,$LogLevel,now()));
        }

        if(config('notification.slack.error_log.enabled') == true){
            ExceptionNotificationLog::notifySlackLog($errorLogs, $activity, $logs, $LogLevel);
        }
    }

    protected static function configSlackLog() {
        return Log::stack(['daily',Log::build(config('notification.slack.error_log.config'))]);
    }

    protected static function notifySlackLog($errorLogs =null, $activity, $logs, $LogLevel) {
        switch ($LogLevel->value){
            case 0:
                ExceptionNotificationLog::configSlackLog()->emergency($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 1:
                ExceptionNotificationLog::configSlackLog()->alert($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 2:
                ExceptionNotificationLog::configSlackLog()->critical($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 3:
                ExceptionNotificationLog::configSlackLog()->error($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 4:
                ExceptionNotificationLog::configSlackLog()->warning($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 5:
                ExceptionNotificationLog::configSlackLog()->notice($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 6:
                ExceptionNotificationLog::configSlackLog()->info($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
            case 7:
                ExceptionNotificationLog::configSlackLog()->debug($errorLogs,["activity"=>$activity,"logs"=>$logs]);
            break;
        }
    }
}