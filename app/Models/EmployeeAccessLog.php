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
 * @property int|null $gate_id
 * @property string $barcode_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Employee $employee
 * @property-read Gate|null $gate
 * @property-read EmployeeBarcode $barcode
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog whereGateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog whereLogTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EmployeeAccessLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmployeeAccessLog extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeAccessLogFactory> */
    use HasFactory;

    protected $table = 'employee_access_logs';
    protected $guarded = [];

    protected $casts = [
        'barcode_type' => BarcodeType::class,
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function gate(): BelongsTo
    {
        return $this->belongsTo(Gate::class);
    }
}
