<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(23,60),
            'joining_date' => $this->faker->dateTime(),
            'salary' => $this->faker->numberBetween(50000,150000),
            'bonus'=> $this->faker->randomFloat(2,100,5000),
            'medical_claims' => $this->faker->numberBetween(500,20000),
            'allowences' => $this->faker->numberBetween(500,2000),
            'leave_payments' => $this->faker->numberBetween(100,2000)
        ];
    }
}
