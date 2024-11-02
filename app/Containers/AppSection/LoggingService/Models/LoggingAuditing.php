<?php

namespace App\Containers\AppSection\LoggingService\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use OwenIt\Auditing\Models\Audit;

/**
 * App\Containers\AppSection\LoggingService\Models\LoggingAuditing
 *
 * @property int $id
 * @property string|null $user_type
 * @property string|null $user_id
 * @property string $event
 * @property string $auditable_id
 * @property string $auditable_type
 * @property array|null $old_values
 * @property array|null $new_values
 * @property string|null $url
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $auditable
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $user
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereAuditableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereAuditableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereNewValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereOldValues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoggingAuditing whereUserType($value)
 * @mixin \Eloquent
 */
class LoggingAuditing extends Audit
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'LoggingAuditing';
}
