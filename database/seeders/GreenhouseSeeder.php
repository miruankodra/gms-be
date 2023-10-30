<?php

namespace Database\Seeders;

use App\Models\Greenhouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GreenhouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Greenhouse::factory(20)->create(['type' => 'Bussiness']);
    }
}
