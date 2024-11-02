<?php

namespace App\Containers\AppSection\LoggingService\Data\Factories;

use App\Containers\AppSection\LoggingService\Models\LoggingService;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class LoggingServiceFactory extends ParentFactory
{
    protected $model = LoggingService::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
