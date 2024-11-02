<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\ApiController as AbstractApiController;
use App\Ship\Monitoring\ActivityLog\Traits\ErrorMorphTraits;
use App\Ship\Traits\ValidationTraits;
use Exception;

abstract class ApiController extends AbstractApiController
{
    use ValidationTraits;
}
