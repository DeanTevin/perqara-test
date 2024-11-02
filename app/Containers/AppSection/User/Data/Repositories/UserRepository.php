<?php

namespace App\Containers\AppSection\User\Data\Repositories;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of User
 *
 * @extends ParentRepository<TModel>
 */
class UserRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'email' => '=',
        'email_verified_at' => 'like',
        'created_at' => 'like',
    ];

    public function model(): string
    {
        return config('auth.providers.users.model');
    }

    public function isRootSuperuser($id)
    {
        if (empty($this->find($id))){
            throw new NotFoundException;
        }

        $result = $this->findWhere([
            'id'=> $id,
            'username'=>config('appSection-authorization.username'),
            'name'=>config('appSection-authorization.name') 
        ])->first();

        return !empty($result);
    }

    public function isEmailVerified($id): bool
    {
        $result = $this->find($id);
        if (empty($result)){
            throw new NotFoundException;
        }

        if (empty($this->email_verified_at)){
            return false;
        }

        return true;
    }
}
