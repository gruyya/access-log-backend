<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $postal_code
 * @property string $city
 * @property string|null $phone_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gate[] $gates
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barrack whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Barrack extends Model
{
    /** @use HasFactory<\Database\Factories\BarrackFactory> */
    use HasFactory;

    protected $table = 'barracks';
    protected $guarded = [];

    public function gates(): HasMany
    {
        return $this->hasMany(Gate::class);
    }
}
