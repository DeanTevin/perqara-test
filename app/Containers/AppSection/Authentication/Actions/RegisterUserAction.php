<?php

namespace App\Containers\AppSection\Authentication\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Authentication\Notifications\Welcome;
use App\Containers\AppSection\Authentication\Tasks\SendVerificationEmailTask;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterUserRequest;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Actions\Action as ParentAction;
use Exception;

class RegisterUserAction extends ParentAction
{
    public function __construct(
        private readonly CreateUserTask $createUserTask,
        private readonly SendVerificationEmailTask $sendVerificationEmailTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(RegisterUserRequest $request): User
    {
        try{ 
            $sanitizedData = $request->sanitizeInput([
                'username',
                'email',
                'password',
                'name',
                'gender',
                'birth',
            ]);

            $user = $this->createUserTask->run($sanitizedData);

            $user->notify(new Welcome());
            $this->sendVerificationEmailTask->run($user, $request->verification_url);
        
            return $user;
        }catch(Exception $e){
            ErrorLogger::alert('User: Create', 'RegisterUserAction Error', get_class($this), $e);
            throw $e;
        }
    }
}
