<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'greenhouse_id' => fake()->numberBetween(1,21),
            'name' => fake()->name(),
            'ip_address' => fake()->ipv4(),
        ];
    }
}
