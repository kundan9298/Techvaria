<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HR>
 */
class HRFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name,
            'email'       => $this->faker->unique()->safeEmail,
            'phone'       => $this->faker->phoneNumber,
            'dob'         => $this->faker->date('Y-m-d', '2000-01-01'),
            'gender'      => $this->faker->randomElement(['Male', 'Female',]),
            'city'        => $this->faker->city,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
