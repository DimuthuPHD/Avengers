<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class SheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'route_id' => Route::inRandomOrder()->first(),
            'bus_id' => Bus::inRandomOrder()->first(),
            'departure_at' => fake()->time('H:i'),
            'arrive_at' => fake()->time('H:i'),
            'notes' => fake()->sentence(),
            'status' => fake()->randomElement([1, 0]),
        ];
    }
}
