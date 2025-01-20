<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *

 * @property int $id
 * @property int $barrack_id
 * @property string $name
 * @property string $ip_address
 * @property string|null $phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Barrack $barrack
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereBarrackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate query()
 * @mixin \Eloquent
 */
class Gate extends Model
{
    /** @use HasFactory<\Database\Factories\GateFactory> */
    use HasFactory;

    protected $table = 'gates';
    protected $guarded = [];

    public function barrack(): BelongsTo
    {
        return $this->belongsTo(Barrack::class);
    }
}
