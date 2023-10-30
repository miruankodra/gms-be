<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bot;
use App\Models\Greenhouse;
use Database\Factories\BotFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

        Greenhouse::factory()->create([
            'name' => 'AdminFarm',
            'country' => 'Albania',
            'city' => 'Tirana',
            'type' => 'Bussiness',
            'area' => 100,
            'location' => 'Rruga e Rupit, Memaliaj',
        ]);

        \App\Models\User::factory()->create([
             'greenhouse_id' => 1,
             'firstname' => 'Admin',
             'lastname' => 'User',
             'username' => 'admin',
             'email' => 'admin@gms.al',
             'phone' => '+355 67 578 9678',
             'country' => 'Albania',
             'city' => 'Tirana',
             'zip' => '1023',
             'active' => true,
             'type' => 'Admin',
        ]);

        Bot::factory()->create([
            'greenhouse_id' => 1,
            'name' => 'Mikail',
            'ip_address' => '192.168.1.99',
        ]);



    }
}
