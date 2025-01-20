<?php

namespace Database\Factories;

use App\Models\Barrack;
use App\Models\Gate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gate>
 */
class GateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'barrack_id' => Barrack::factory(),
            'name' => $this->faker->name,
            'ip_address' => $this->faker->ipv4,
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}