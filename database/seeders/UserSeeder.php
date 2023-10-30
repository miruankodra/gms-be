<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create([
            'zip' => '1023',
            'active' => true,
            'type' => 'User',
        ]);
    }
}