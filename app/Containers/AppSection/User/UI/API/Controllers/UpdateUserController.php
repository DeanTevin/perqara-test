<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\UpdateUserAction;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\SQLQueryException;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use PDOException;
use Throwable;

class UpdateUserController extends ApiController
{
    public function __invoke(UpdateUserRequest $request, UpdateUserAction $action): JsonResponse
    {
        try{
            $user = $action->transactionalRun($request);

            return $this->json($this->transform($user, UserTransformer::class),200);
        }
        catch(Throwable $e){
            ErrorLogger::alert('User: Update', 'UpdateUserController Error', get_class($this), $e);
            throw $e;
        }
    }
}
