<?php

namespace Src\JobApplication\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'expected_salary' => fake()->numberBetween(4_000, 170_000),
        ];
    }
}
