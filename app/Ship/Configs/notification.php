<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Default Namespace
     |--------------------------------------------------------------------------
     |
     | Define what channels do all your notifications support.
     |
     */
    'channels' => [
        'database',
//        'mail',
    ],

    /*
     * Microsoft teams webhooks notification.
     * 
     * we can have multiple webhooks channels for each functionality.
     * in this case, we define the error log to post in designated channels.
     */
    'microsoft_teams' => [
        'error_log' => [
            'url' => env('TEAMS_ERROR_WEBHOOKS_NOTIFICATION'),
            'enabled' => env('TEAMS_ERROR_LOG',false)
        ]
    ],
    'slack' => [
        'error_log' => [
            'enabled' => env('SLACK_ERROR_LOG',true),
            'config' => config('logging.channels.slack_activity')
        ]
    ]
];
