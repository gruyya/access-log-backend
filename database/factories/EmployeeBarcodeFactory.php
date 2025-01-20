<?php

namespace Database\Factories;

use App\Enums\BarcodeType;
use App\Models\Employee;
use App\Models\EmployeeBarcode;
use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeBarcode>
 */
class EmployeeBarcodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeBarcode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::factory(),
            'code' => $this->faker->unique()->randomNumber(8),
            'type' => BarcodeType::IN,
            'valid_until' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
