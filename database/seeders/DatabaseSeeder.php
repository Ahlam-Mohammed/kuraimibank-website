<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(CountrySeeder::class);
       $this->call(CitySeeder::class);
       $this->call(ServicePointSeeder::class);
       $this->call(CategorySeeder::class);
       $this->call(ServiceSeeder::class);
       $this->call(ExchangeRateSeeder::class);
       $this->call(NewsSeeder::class);
    }
}
