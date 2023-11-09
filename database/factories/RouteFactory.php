<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'code' => 'R-' . strtoupper(implode('-', fake()->unique()->words(2))),
            'from' => fake()->city(),
            'to' => fake()->city(),
            'status' => fake()->randomElement([1, 0]),
        ];
    }
}
