<?php

namespace App\Ship\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use App\Ship\Seeders\ActivityLogging\LogLevelSeeder;

class SeedTestingData extends Seeder
{
    /**
     * Note: This seeder is not loaded automatically by Apiato
     * This is a special seeder which can be called by "apiato:seed-test" command
     * It is useful for seeding testing data.
     */
    public function run(): void
    {
        // Create Testing data for live tests
        $this->call([
            LogLevelSeeder::class,
        ]);
    }
}
