<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title' => [
                'ar' => 'زيارة مدير برنامج الغذاء العالمي للشرق الأوسط ومدير البرنامج في اليمن',
                'en' => 'The visit of the Director of the World Food Program to the Middle East and the Director of the Program in Yemen'
            ],
            'desc' => [
                'ar' => 'من زيارة مدير برنامج الغذاء العالمي للشرق الأوسط ومدير البرنامج في اليمن كان في استقبالهم مساعد الرئيس التنفيذي لبنك الكريمي ورئيس قطاع ام فلوس ومدير إدارة المنظمات وذلك لتفقد سير عملية صرف التحويلات الإنسانية لمشروع CBT في مديرية التحرير ',
                'en' => 'The visit of the Director of the World Food Program to the Middle East and the Director of the Program in Yemen'
            ],
            'background' => 'background',
        ]);

        News::create([
            'title' => [
                'ar' => 'UNDPArabic',
                'en' => 'UNDPArabic'
            ],
            'desc' => [
                'ar' => 'التعاون المشترك بين برنامج الأمم المتحدة الإنمائي في #اليمن ومنظمة الصحة العالمية وبنك الكريمي الإسلامي للتمويل الأصغر ',
                'en' => 'The visit of the Director of the World Food Program to the Middle East and the Director of the Program in Yemen'
            ],
            'background' => 'background',
        ]);
    }
}
