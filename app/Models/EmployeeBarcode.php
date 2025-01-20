<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\BarcodeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 
 *
 * @property int $id
 * @property int $employee_id
 * @property string $code
 * @property BarcodeType $type
 * @property string|null $valid_until
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Employee $employee
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereValidUntil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeBarcode whereValue($value)
 * @mixin \Eloquent
 */
class EmployeeBarcode extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeBarcodeFactory> */
    use HasFactory;

    protected $table = 'employee_barcodes';
    protected $guarded = [];
    
    protected $casts = [
        'type' => BarcodeType::class,
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
