<?php


namespace Database\Seeders;


use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Statistic::factory(30)->create([
            'greenhouse_id' => 1,
        ]);
    }
}