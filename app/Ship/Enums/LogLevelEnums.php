<?php

namespace App\Ship\Enums;

/**
 * Class LogLevelEnums
 * @package App\Ship\Enums
 * @method static string EMERGENCY
 * @method static string ALERT
 * @method static string CRITICAL
 * @method static string ERROR
 * @method static string WARNING
 * @method static string NOTICE
 * @method static string INFORMATIONAL
 * @method static string DEBUG
 */
enum LogLevelEnums:int {
    case EMERGENCY      = 0;
    case ALERT          = 1;
    case CRITICAL       = 2;
    case ERROR          = 3;
    case WARNING        = 4;
    case NOTICE         = 5;
    case INFORMATIONAL  = 6;
    case DEBUG          = 7;

    /**
     * Get the description for the given log level code.
     *
     * @param string $code The log level code.
     * @return string|null The description of the log level, or null if not found.
     */
    public static function getDescription(int $code): ?string
    {
        $descriptions = [
            '0' => 'System is unusable',
            '1' => 'Action must be taken immediately',
            '2' => 'Critical conditions',
            '3' => 'Error conditions',
            '4' => 'Warning conditions',
            '5' => 'Normal but significant condition',
            '6' => 'Informational messages',
            '7' => 'Debug-level messages',
        ];

        return $descriptions[$code] ?? null;
    }
}