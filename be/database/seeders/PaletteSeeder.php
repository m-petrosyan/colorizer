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

        $palettes = [
            [
                '#264653',
                '#2a9d8f',
                '#e9c46a',
                '#f4a261',
                '#e76f51',
            ],
            [
                '#cdb4db',
                '#ffc8dd',
                '#ffafcc',
                '#bde0fe',
                '#a2d2ff',
            ],
            [
                '#ccd5ae',
                '#e9edc9',
                '#fefae0',
                '#faedcd',
                '#d4a373',
            ],
            [
                '#8ecae6',
                '#219ebc',
                '#023047',
                '#ffb703',
                '#fb8500',
            ],
            [
                '#e63946',
                '#f1faee',
                '#a8dadc',
                '#457b9d',
                '#1d3557',
            ],
            [
                '#dad7cd',
                '#a3b18a',
                '#588157',
                '#3a5a40',
                '#344e41',
            ],
            [
                '#f94144',
                '#f3722c',
                '#f8961e',
                '#f9844a',
                '#f9c74f',
                '#90be6d',
                '#43aa8b',
                '#4d908e',
                '#577590',
                '#277da1'
            ],
        ];


        for ($i = 0; $i < count($palettes); $i++) {
            $likes = [];
            for ($j = 0; $j < rand(15, 30); $j++) {
                $likes[] = User::all()->random()->id;
            }
            Palette::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'title' => 'Palette',
                'palettes' => $palettes[$i],
            ])->likes()->syncWithoutDetaching($likes);
        }
    }
}
