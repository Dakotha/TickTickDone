<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priorities = ['low', 'medium', 'high'];
        $statuses = ['to-do', 'in progress', 'done'];

        return [
            'user_id' => User::all()->random()->id,
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(3),
            'priority' => $this->faker->randomElement($priorities),
            'status' => $this->faker->randomElement($statuses),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
