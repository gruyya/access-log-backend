<?php

namespace Database\Factories;

use App\Enums\BarcodeType;
use App\Models\EmployeeAccessLog;
use App\Models\Employee;
use App\Models\EmployeeBarcode;
use App\Models\Gate;
use Faker\Core\Barcode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeAccessLog>
 */
class EmployeeAccessLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeAccessLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'gate_id' => Gate::factory(),
            'barcode_id' => EmployeeBarcode::factory(),
            'created_at' => now(),
        ];
    }
}