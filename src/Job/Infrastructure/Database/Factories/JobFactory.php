<?php

namespace Src\Job\Infrastructure\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Job\Infrastructure\EloquentModels\JobEloquentModel;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(3, true),
            'salary' => fake()->numberBetween(5_000, 150_000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(JobEloquentModel::$categories),
            'experience' => fake()->randomElement(JobEloquentModel::$experiences),
        ];
    }
}
