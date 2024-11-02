<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\UI\API\Requests\DeleteUserRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Actions\Action as ParentAction;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DeleteUserAction extends ParentAction
{
    public function __construct(
        private readonly UserRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws DeleteResourceFailedException
     */
    public function run(DeleteUserRequest $request): bool
    {
        try{
            if($this->repository->isRootSuperuser($request->id)){
                throw new HttpException(403,"Cannot delete default Superuser");  
             }
             return $this->repository->delete($request->id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException(previous: $e);
        } catch (Exception $e){
            throw new DeleteResourceFailedException;
        }
    }
}
