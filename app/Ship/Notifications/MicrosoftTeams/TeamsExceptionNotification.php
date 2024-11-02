<?php

namespace App\Ship\Notifications\MicrosoftTeams;

use App\Ship\Enums\LogLevelEnums;
use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Error;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsChannel;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsMessage;

class ExceptionNotification extends ParentNotification
{
    protected $notificationMessage;
    protected $exceptionCode;
    protected $exceptionMsg;
    protected $exceptionTrace;
    protected $exceptionFile;
    protected $LogLevel;
    protected $timestamp;
    
    public function __construct($notificationMessage = null, Exception|Error $exception,$LogLevel,$timestamp)
    {
        $this->timestamp = $timestamp;
        $this->LogLevel = $LogLevel->name;
        $this->notificationMessage = $notificationMessage;
        $this->exceptionCode = $exception->getCode();
        $this->exceptionMsg = $exception->getMessage();
        $this->exceptionTrace = $exception->getTraceAsString();
        $this->exceptionFile = $exception->getFile();
    }

    public function via($notifiable): array
    {
        return [MicrosoftTeamsChannel::class];
    }
    
    public function toMicrosoftTeams($notifiable)
    {
        if(!empty(config('notification.microsoft_teams.error_log.url'))){
            return MicrosoftTeamsMessage::create()
            ->to(config('notification.microsoft_teams.error_log.url'))
            ->type('error')
            ->title(config('app.name'))
            ->content(
            '<b><u>Severity:</u> <span style="color:red;">'. $this->LogLevel .'</span></b>    
            '.
            '**Status Code:** '. $this->exceptionCode .'    
            '.
            '**Message:** ' . $this->exceptionMsg  .'    
            '.
            '**Server Time:** '. $this->timestamp .'    
            '.
            '**Stacktrace:** 
            ' .'``'.$this->exceptionFile.'``'.'    
            '.
            '**Trace:** 
            ' .'``'.$this->exceptionTrace.'``');       
        }
    }
}
