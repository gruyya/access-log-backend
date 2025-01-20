<?php

namespace App\Models;

use App\Enums\RankType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $unit_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $image
 * @property string $jmbg
 * @property RankType $rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmployeeAccessLog[] $employeeAccessLogs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EmployeeBarcode[] $employeeBarcodes
 * @property-read Unit $unit
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereJmbg($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereMidleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    
    protected $table = 'employees';
    protected $guarded = [];

    protected $casts = [
        'rank' => RankType::class,
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function employeeAccessLogs(): HasMany
    {
        return $this->hasMany(EmployeeAccessLog::class);
    }

    public function employeeBarcodes(): HasMany
    {
        return $this->hasMany(EmployeeBarcode::class);
    }
}
