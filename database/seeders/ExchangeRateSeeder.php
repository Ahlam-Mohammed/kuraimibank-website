<?php

namespace Database\Seeders;

use App\Models\ExchangeRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExchangeRate::create([
            'name' => [
                'ar' => 'دولار أمريكي - صنعاء',
                'en' => "USA dollar- Sana'a"
            ],
            'sale' => 562,
            'buy'  => 557
        ]);

        ExchangeRate::create([
            'name' => [
                'ar' => 'ريال سعودي - صنعاء',
                'en' => "Saudi ryal-Sana'a"
            ],
            'sale' => 148.5,
            'buy'  => 148
        ]);

        ExchangeRate::create([
            'name' => [
                'ar' => 'ريال سعودي - عدن',
                'en' => "Saudi ryal-aden"
            ],
            'sale' => 148.5,
            'buy'  => 148
        ]);
    }
}
