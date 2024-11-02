<?php

namespace App\Containers\AppSection\Authentication\UI\API\Requests;

use App\Containers\AppSection\User\Enums\Gender;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [];

    protected array $urlParameters = [];

    public function rules(): array
    {
        return [
            'username' => [
                'required', 
                'min:5', 
                'max:20',
                Rule::unique(User::class,'username')],
            'email' => 'required|email',
            'password' => [
                'required',
                Password::default(),
            ],
            'name' => 'min:2|max:50',
            'gender' => [
                'required',
                Rule::enum(Gender::class)],
            'birth' => 'required|date|before:today',
            'verification_url' => [
                'url',
                Rule::requiredIf(static fn (): bool => config('appSection-authentication.require_email_verification')),
                Rule::in(config('appSection-authentication.allowed-verify-email-urls')),
            ],
        ];
    }

    public function authorize(): bool
    {
        return $this->hasAccess();
    }
}
