<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Palette>
 */
class PaletteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'palettes' => [
                $this->faker->hexColor,
                $this->faker->hexColor,
                $this->faker->hexColor,
                $this->faker->hexColor,
                $this->faker->hexColor,
            ],
        ];
    }
}
