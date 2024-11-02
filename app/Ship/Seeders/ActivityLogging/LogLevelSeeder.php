<?php

namespace App\Ship\Seeders\ActivityLogging;

use App\Ship\Enums\LogLevelEnums;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Illuminate\Support\Facades\DB;

/**
* Log_Level Seeder Class
* 
* This class is for populating the log_level table using a referenced data from [RFC-5424](https://datatracker.ietf.org/doc/html/rfc5424) 
* Section 6, Page 10: Table 2. Syslog Message Severities
*
* @extends ParentSeeder
*/
class LogLevelSeeder extends ParentSeeder
{
    public function run()
    {
        foreach (LogLevelEnums::cases() as $severity) {
            DB::table('log_level')->insert([
                'id' => $severity->value,
                'severity' => $severity->name,
                'description' => LogLevelEnums::getDescription($severity->value),
            ]);
        }
    }
}
