<?php

namespace Database\Factories;

use App\Models\Palette;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Palette>
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
            'title' => 'Palette',
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
