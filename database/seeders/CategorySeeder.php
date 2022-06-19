<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => [
                'ar' => 'خدمات الأفراد',
                'en' => 'Personal'
            ]
        ]);

        Category::create([
            'name' => [
                'ar' => 'خدمات الشركات',
                'en' => 'Corporate'
            ]
        ]);

        Category::create([
            'name' => [
                'ar' => 'كريمي إكسبرس',
                'en' => 'Kuraimi Express'
            ]
        ]);
    }
}
