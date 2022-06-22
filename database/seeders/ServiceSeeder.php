<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => [
                'ar' => 'الحساب الجاري (كريمي مميز)',
                'en' => ''
            ],
            'desc' => [
                'ar' => 'يقدِّم بنك الكريمي للتمويل الأصغر الإسلامي خدمة الحساب الجاري (كريمي مميز) للعملاء الراغبين بالحفاظ على أموالهم بطريقة آمنة ومرنة وتمكِّنهم من إدارتها بكل سهولة ويسر من أي مكان وفي أي وقت عبر باقة من الخدمات المميَّزة.',
                'en' => ''
            ],
            'background' => 'logo.svg',
            'image'      => 'logo.svg',
            'other_advantage' => [
                'ar' => 'مميزات الحساب الجاري (كريمي مميز):',
                'en' => ''
            ],
            'service_condition' => [
                'ar' => 'شروط فتح الحساب:',
                'en'
            ],
            'category_id'     => 1
        ]);

        Service::create([
            'name' => [
                'ar' => 'حساب التوفير (الكريمي توفير)',
                'en' => ''
            ],
            'desc' => [
                'ar' => 'يقدِّم بنك الكريمي للتمويل الأصغر الإسلامي خدمة الحساب الجاري (كريمي مميز) للعملاء الراغبين بالحفاظ على أموالهم بطريقة آمنة ومرنة وتمكِّنهم من إدارتها بكل سهولة ويسر من أي مكان وفي أي وقت عبر باقة من الخدمات المميَّزة.',
                'en' => ''
            ],
            'background' => 'logo.svg',
            'image'      => 'logo.svg',
            'other_advantage' => [
                'ar' => 'مميزات الحساب الجاري (كريمي مميز):',
                'en' => ''
            ],
            'service_condition' => [
                'ar' => 'شروط فتح الحساب:',
                'en'
            ],
            'category_id'     => 2
        ]);

        Service::create([
            'name' => [
                'ar' => 'الحساب الجاري (كريمي مميز)',
                'en' => ''
            ],
            'desc' => [
                'ar' => 'يقدِّم بنك الكريمي للتمويل الأصغر الإسلامي خدمة الحساب الجاري (كريمي مميز) للعملاء الراغبين بالحفاظ على أموالهم بطريقة آمنة ومرنة وتمكِّنهم من إدارتها بكل سهولة ويسر من أي مكان وفي أي وقت عبر باقة من الخدمات المميَّزة.',
                'en' => ''
            ],
            'background' => 'logo.svg',
            'image'      => 'logo.svg',
            'other_advantage' => [
                'ar' => 'مميزات الحساب الجاري (كريمي مميز):',
                'en' => ''
            ],
            'service_condition' => [
                'ar' => 'شروط فتح الحساب:',
                'en'
            ],
            'category_id'     => 1
        ]);
    }
}
