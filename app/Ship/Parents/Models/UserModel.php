<?php

namespace App\Ship\Parents\Models;

use Apiato\Core\Abstracts\Models\UserModel as AbstractUserModel;
use App\Ship\Contracts\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

abstract class UserModel extends AbstractUserModel implements Authorizable, Auditable
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    use AuditingAuditable;
}
