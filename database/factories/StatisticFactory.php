<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'greenhouse_id' => fake()->randomNumber(1, 21),
            'temp_avg' => fake()->randomFloat(2, 1, 33),
            'air_humid_avg' => fake()->randomFloat(2, 1, 33),
            'soil_humid_avg' => fake()->randomFloat(2, 1, 33),
            'day' => fake()->numberBetween(1, 30,)
        ];
    }
}
