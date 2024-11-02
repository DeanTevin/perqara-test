<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Actions\Action as ParentAction;
use Exception;
use Throwable;
use TypeError;

class UpdateUserAction extends ParentAction
{
    public function __construct(
        private readonly UpdateUserTask $updateUserTask,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(UpdateUserRequest $request): User
    {
        try{
        $sanitizedData = $request->sanitizeInput([
            'name',
            'gender',
            'birth',
        ]);

        return $this->updateUserTask->run($request->id, $sanitizedData);
        }catch(Throwable|Exception $e){
            ErrorLogger::alert('User: Update', 'UpdateUserAction Error', get_class($this), $e);
            throw $e;
        }
    }
}
