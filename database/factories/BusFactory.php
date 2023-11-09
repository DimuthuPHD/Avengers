<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'B-' . strtoupper(implode('-', fake()->unique()->words(2))),
            'owner_name' => fake()->name(),
            'owner_phone' => fake()->phoneNumber(),
            'owner_address' => fake()->address(),
            'number_plate' => strtoupper(fake()->unique()->bothify('??? - ######')),
            'notes' => fake()->sentence(),
            'status' => fake()->randomElement([1, 0]),
        ];
    }
}
