<?php

namespace App\Containers\AppSection\LoggingService\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class LogViewerRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => null,
        'roles' => 'admin',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
    ];

    /**
     * Defining the URL parameters (`/stores/999/items`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [];

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
