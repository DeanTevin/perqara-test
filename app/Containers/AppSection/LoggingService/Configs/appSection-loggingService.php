<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AppSection Section LoggingService Container
    |--------------------------------------------------------------------------
    |   This section is to configure the loggingservice container.
    |   
    |   1.logviewer_enabled: enables or disables the route for laravel logviewer.
    |
    |
    |
    */

    'logviewer_enabled' => env('LOGVIEWER_ENABLED',false),
    'logviewer_route' => env('LOGVIEWER_ROUTE', 'logging-services')

];
