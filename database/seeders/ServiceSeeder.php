<?php

namespace Database\Seeders;

use App\Enum\SettingEnum;
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
                'ar' => 'ماكينات الصراف الآلي',
                'en' => 'Automated teller machines'
            ],
            'desc' => [
                'ar' => 'يقدِّم بنك الكريمي للتمويل الأصغر الإسلامي خدمة الحساب الجاري (كريمي مميز) للعملاء الراغبين بالحفاظ على أموالهم بطريقة آمنة ومرنة وتمكِّنهم من إدارتها بكل سهولة ويسر من أي مكان وفي أي وقت عبر باقة من الخدمات المميَّزة.',
                'en' => 'Al-Kuraimi Bank for Islamic Microfinance offers the current account service (Karimi Premium) to customers who wish to keep their money in a safe and flexible manner, enabling them to manage it with ease and ease from anywhere and at any time through a package of distinguished services'
            ],
            'background' => 'bg1.jpg',
            'image'      => 'service-1.png',
            'other_advantage' => [
                'ar' => 'مميزات الحساب الجاري (كريمي مميز):',
                'en' => ''
            ],
            'service_condition' => [
                'ar' => 'شروط فتح الحساب:',
                'en'
            ],
            'category_id'     => 1,
            'position' => SettingEnum::POSITION_HOME_MAIN
        ]);

        Service::create([
            'name' => [
                'ar' => 'البطاقات الإئتمانية',
                'en' => 'credit cards'
            ],
            'desc' => [
                'ar' => 'يقدِّم بنك الكريمي للتمويل الأصغر الإسلامي خدمة الحساب الجاري (كريمي مميز) للعملاء الراغبين بالحفاظ على أموالهم بطريقة آمنة ومرنة وتمكِّنهم من إدارتها بكل سهولة ويسر من أي مكان وفي أي وقت عبر باقة من الخدمات المميَّزة.',
                'en' => 'Al-Kuraimi Bank for Islamic Microfinance offers the current account service (Karimi Premium) to customers who wish to keep their money in a safe and flexible manner, enabling them to manage it with ease and ease from anywhere and at any time through a package of distinguished services'
            ],
            'background' => 'bg1.jpg',
            'image'      => 'service-2.png',
            'other_advantage' => [
                'ar' => 'مميزات الحساب الجاري (كريمي مميز):',
                'en' => ''
            ],
            'service_condition' => [
                'ar' => 'شروط فتح الحساب:',
                'en'
            ],
            'category_id'     => 2,
            'position' => SettingEnum::POSITION_HOME_MAIN
        ]);

        Service::create([
            'name' => [
                'ar' => 'مشروعي',
                'en' => 'my project'
            ],
            'desc' => [
                'ar' => 'يقدِّم بنك الكريمي للتمويل الأصغر الإسلامي خدمة الحساب الجاري (كريمي مميز) للعملاء الراغبين بالحفاظ على أموالهم بطريقة آمنة ومرنة وتمكِّنهم من إدارتها بكل سهولة ويسر من أي مكان وفي أي وقت عبر باقة من الخدمات المميَّزة.',
                'en' => 'Al-Kuraimi Bank for Islamic Microfinance offers the current account service (Karimi Premium) to customers who wish to keep their money in a safe and flexible manner, enabling them to manage it with ease and ease from anywhere and at any time through a package of distinguished services'
            ],
            'background' => 'bg1.jpg',
            'image'      => 'service-3.png',
            'other_advantage' => [
                'ar' => 'مميزات الحساب الجاري (كريمي مميز):',
                'en' => ''
            ],
            'service_condition' => [
                'ar' => 'شروط فتح الحساب:',
                'en'
            ],
            'category_id'     => 1,
            'position' => SettingEnum::POSITION_HOME_MAIN
        ]);
    }
}
