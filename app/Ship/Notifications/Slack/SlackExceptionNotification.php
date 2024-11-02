<?php

namespace App\Ship\Notifications\Slack;

use App\Ship\Enums\LogLevelEnums;
use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Error;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ContextBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\SectionBlock;
use Illuminate\Notifications\Slack\SlackMessage;
use Illuminate\Notifications\Slack\SlackChannel;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsChannel;
use NotificationChannels\MicrosoftTeams\MicrosoftTeamsMessage;

class SlackExceptionNotification extends ParentNotification
{
    // protected $notificationMessage;
    // protected $exceptionCode;
    // protected $exceptionMsg;
    // protected $exceptionTrace;
    // protected $exceptionFile;
    // protected $LogLevel;
    // protected $timestamp;
    
    // public function __construct($notificationMessage = null, Exception|Error $exception,$LogLevel,$timestamp)
    // {
    //     $this->timestamp = $timestamp;
    //     $this->LogLevel = $LogLevel->name;
    //     $this->notificationMessage = $notificationMessage;
    //     $this->exceptionCode = $exception->getCode();
    //     $this->exceptionMsg = $exception->getMessage();
    //     $this->exceptionTrace = $exception->getTraceAsString();
    //     $this->exceptionFile = $exception->getFile();
    // }

    public function via($notifiable): array
    {
        return [SlackChannel::class];
    }
    
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->text('One of your invoices has been paid!')
            ->headerBlock('Invoice Paid')
            ->contextBlock(function (ContextBlock $block) {
                $block->text('Customer #1234');
            })
            ->sectionBlock(function (SectionBlock $block) {
                $block->text('An invoice has been paid.');
                $block->field("*Invoice No:*\n1000")->markdown();
                $block->field("*Invoice Recipient:*\ntaylor@laravel.com")->markdown();
            })
            ->dividerBlock()
            ->sectionBlock(function (SectionBlock $block) {
                $block->text('Congratulations!');
            });
    }
}
