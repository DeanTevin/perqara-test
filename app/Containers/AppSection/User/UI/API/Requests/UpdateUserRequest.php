<?php

namespace App\Containers\AppSection\User\UI\API\Requests;

use App\Containers\AppSection\User\Enums\Gender;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];
    
    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'uuid|required',
            'username' => Rule::unique(User::class,'username'),
            'name' => 'required|min:2|max:50',
            'gender' => [Rule::enum(Gender::class),'required'],
            'birth' => 'date|before:today',
            'email' => 'email',
            'phone' => 'string',
        ];
    }

    public function authorize(Gate $gate): bool
    {
        return $gate->allows('update', [User::class, $this->id]);
    }
}
