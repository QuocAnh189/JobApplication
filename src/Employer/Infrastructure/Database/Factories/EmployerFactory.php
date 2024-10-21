<?php

namespace Src\Employer\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'user_id' => fake()->uuid(),
        ];
    }
}
