<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
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

        SubCategory::create([
            'name' => [
                'ar' => 'الحسابات البنكية',
                'en' => 'Banking Accounts'
            ],
            'category_id' => 1
        ]);

        SubCategory::create([
            'name' => [
                'ar' => 'الخدمات الإلكترونية',
                'en' => 'Electronic Services'
            ],
            'category_id' => 1
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
