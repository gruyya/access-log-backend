<?php

namespace App\Http\Resources;

use App\Enums\BarcodeType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \App\Models\Employee;
use Faker\Core\Barcode;

/**
 * @mixin Employee
 */
class EmployeeResource extends JsonResource
{
    private ?BarcodeType $barcodeType = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->first_name . ' ' . $this->last_name,
            'image' => url($this->image),
            'rank' => $this->rank,
            'unit' => $this->unit->name,
            'barcode_type' => $this->barcodeType,
        ];
    }

    public function setBarcodeType(BarcodeType $barcodeType): self
    {
        $this->barcodeType = $barcodeType;

        return $this;
    }
}
