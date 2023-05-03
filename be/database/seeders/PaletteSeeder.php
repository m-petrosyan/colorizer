<?php

namespace Database\Seeders;

use App\Models\Palette;
use App\Models\User;
use Illuminate\Database\Seeder;

class PaletteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Palette::factory(15)->create()->each(function ($item) {
            $likes = rand(0, 10);

            for ($i = 0; $i < $likes; $i++) {
                $item->likes()->syncWithoutDetaching(User::all()->random()->id);
            }
        });
    }
}
