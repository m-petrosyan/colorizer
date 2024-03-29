<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(['email' => 'john@gmail.com'], [
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => '12345678',
        ]);

        User::factory(25)->create();
    }
}
