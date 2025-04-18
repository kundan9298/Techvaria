<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidate;
use App\Models\HR;
use App\Models\Department;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interview>
 */
class InterviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jobNames = ['Developer', 'Designer', 'Tester', 'Manager', 'Support'];

        return [
            'job_name'        => Department::inRandomOrder()->value('id'),
            'candidate_name'  => Candidate::inRandomOrder()->value('id'),
            'assigned_to_hr'  => HR::inRandomOrder()->value('id'),
            'place'           => $this->faker->city,
            'date'            => $this->faker->date(),
            'time'            => $this->faker->time(),
            'remainder'       => $this->faker->sentence,
            'status'          => $this->faker->randomElement(['Pending', 'Completed', 'Cancelled']),
 
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
