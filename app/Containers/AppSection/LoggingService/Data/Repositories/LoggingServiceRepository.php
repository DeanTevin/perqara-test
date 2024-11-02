<?php

namespace App\Containers\AppSection\LoggingService\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class LoggingServiceRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
