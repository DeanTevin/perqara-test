<?php return array (
  'apiato/core' => 
  array (
    'providers' => 
    array (
      0 => 'Apiato\\Core\\Providers\\ApiatoServiceProvider',
      1 => 'Vinkla\\Hashids\\HashidsServiceProvider',
      2 => 'Prettus\\Repository\\Providers\\RepositoryServiceProvider',
      3 => 'Spatie\\Fractal\\FractalServiceProvider',
      4 => 'Apiato\\Core\\Generator\\GeneratorsServiceProvider',
    ),
    'aliases' => 
    array (
      'Hashids' => 'Vinkla\\Hashids\\Facades\\Hashids',
      'Fractal' => 'Spatie\\Fractal\\Facades\\Fractal',
    ),
  ),
  'apiato/documentation-generator-container' => 
  array (
    'providers' => 
    array (
      0 => 'App\\Containers\\Vendor\\Documentation\\Providers\\DocumentGeneratorServiceProvider',
    ),
  ),
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facades\\Debugbar',
    ),
  ),
  'barryvdh/laravel-ide-helper' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\LaravelIdeHelper\\IdeHelperServiceProvider',
    ),
  ),
  'laravel-lang/lang' => 
  array (
    'providers' => 
    array (
      0 => 'LaravelLang\\Lang\\ServiceProvider',
    ),
  ),
  'laravel-lang/locales' => 
  array (
    'providers' => 
    array (
      0 => 'LaravelLang\\Locales\\ServiceProvider',
    ),
  ),
  'laravel-lang/publisher' => 
  array (
    'providers' => 
    array (
      0 => 'LaravelLang\\Publisher\\ServiceProvider',
    ),
  ),
  'laravel-notification-channels/microsoft-teams' => 
  array (
    'providers' => 
    array (
      0 => 'NotificationChannels\\MicrosoftTeams\\MicrosoftTeamsServiceProvider',
    ),
  ),
  'laravel/passport' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Passport\\PassportServiceProvider',
    ),
  ),
  'laravel/slack-notification-channel' => 
  array (
    'providers' => 
    array (
      0 => 'Illuminate\\Notifications\\SlackChannelServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'owen-it/laravel-auditing' => 
  array (
    'providers' => 
    array (
      0 => 'OwenIt\\Auditing\\AuditingServiceProvider',
    ),
  ),
  'prettus/l5-repository' => 
  array (
    'providers' => 
    array (
      0 => 'Prettus\\Repository\\Providers\\RepositoryServiceProvider',
    ),
  ),
  'rap2hpoutre/laravel-log-viewer' => 
  array (
    'providers' => 
    array (
      0 => 'Rap2hpoutre\\LaravelLogViewer\\LaravelLogViewerServiceProvider',
    ),
  ),
  'spatie/laravel-activitylog' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Activitylog\\ActivitylogServiceProvider',
    ),
  ),
  'spatie/laravel-fractal' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Fractal\\FractalServiceProvider',
    ),
    'aliases' => 
    array (
      'Fractal' => 'Spatie\\Fractal\\Facades\\Fractal',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
  'spatie/laravel-permission' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
  ),
  'vinkla/hashids' => 
  array (
    'aliases' => 
    array (
      'Hashids' => 'Vinkla\\Hashids\\Facades\\Hashids',
    ),
    'providers' => 
    array (
      0 => 'Vinkla\\Hashids\\HashidsServiceProvider',
    ),
  ),
);