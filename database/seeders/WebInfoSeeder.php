<?php

namespace Database\Seeders;

use App\Enum\WebInfoEnum;
use App\Models\ContactInfo;
use App\Models\FinancialReport;
use App\Models\Principle;
use App\Models\WebInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebInfo::create([
            'key'   => WebInfoEnum::ABOUT,
            'value' =>
                [
                    'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك "  حساب في كل بيت يمني"  ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                    'en' => "About us In June 2010, KIMB was licensed from Central Bank of Yemen(CBY). The main purpose is to reinforce the importance of playing a very active role in enhancing the country’s economic status in the ﬁeld of savings and ﬁnancing plus other ﬁnancial services. The bank would accept all kinds of deposits and invest the deposits in so many ﬁelds in complete compliance with the Islamic Sharia'a. We have now more than 100 branch all over Yemen. Al Kuraimi Islamic Microﬁnance Bank has a vision that all ﬁnancial and banking services are accessible by each person in Yemen, in order to participate in the economic and social development and in raising the standard of living of the individual and community at large by means of offering diverse ﬁnancial services."
                ]
        ]);

        WebInfo::create([
            'key'   => WebInfoEnum::VISION,
            'value' =>
                [
                    'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك "  حساب في كل بيت يمني"  ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                    'en' => "About us In June 2010, KIMB was licensed from Central Bank of Yemen(CBY). The main purpose is to reinforce the importance of playing a very active role in enhancing the country’s economic status in the ﬁeld of savings and ﬁnancing plus other ﬁnancial services. The bank would accept all kinds of deposits and invest the deposits in so many ﬁelds in complete compliance with the Islamic Sharia'a. We have now more than 100 branch all over Yemen. Al Kuraimi Islamic Microﬁnance Bank has a vision that all ﬁnancial and banking services are accessible by each person in Yemen, in order to participate in the economic and social development and in raising the standard of living of the individual and community at large by means of offering diverse ﬁnancial services."
                ]
        ]);

        WebInfo::create([
            'key'   => WebInfoEnum::STRATEGY,
            'value' =>
                [
                    'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك "  حساب في كل بيت يمني"  ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                    'en' => "About us In June 2010, KIMB was licensed from Central Bank of Yemen(CBY). The main purpose is to reinforce the importance of playing a very active role in enhancing the country’s economic status in the ﬁeld of savings and ﬁnancing plus other ﬁnancial services. The bank would accept all kinds of deposits and invest the deposits in so many ﬁelds in complete compliance with the Islamic Sharia'a. We have now more than 100 branch all over Yemen. Al Kuraimi Islamic Microﬁnance Bank has a vision that all ﬁnancial and banking services are accessible by each person in Yemen, in order to participate in the economic and social development and in raising the standard of living of the individual and community at large by means of offering diverse ﬁnancial services."
                ]
        ]);

        ContactInfo::create([
            'key'   => WebInfoEnum::TEL,
            'value' => '+967 1 503888'
        ]);
        ContactInfo::create([
            'key'   => WebInfoEnum::TOLL_FREE,
            'value' => '8008800'
        ]);
        ContactInfo::create([
            'key'   => WebInfoEnum::FAX,
            'value' => '967 1 266202'
        ]);
        ContactInfo::create([
            'key'   => WebInfoEnum::P_O_BOX,
            'value' => '19357'
        ]);
        ContactInfo::create([
            'key'   => WebInfoEnum::EMAIL,
            'value' => 'CS@kuraimibank.com'
        ]);

        Principle::create([
            'title' => [
                'ar' => 'الالتزام',
                'en' => 'Social responsibility'
            ],
            'image' => 'principle-1.png',
            'desc'  => [
                'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك " حساب في كل بيت يمني" ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ]
        ]);

        Principle::create([
            'title' => [
                'ar' => 'نحترم',
                'en' => 'Social responsibility'
            ],
            'image' => 'principle-2.png',
            'desc'  => [
                'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك " حساب في كل بيت يمني" ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ]
        ]);

        Principle::create([
            'title' => [
                'ar' => 'الوضوح و الشفافية',
                'en' => 'Social responsibility'
            ],
            'image' => 'principle-3.png',
            'desc'  => [
                'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك " حساب في كل بيت يمني" ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ]
        ]);

        Principle::create([
            'title' => [
                'ar' => 'حب الخير',
                'en' => 'Social responsibility'
            ],
            'image' => 'principle-4.png',
            'desc'  => [
                'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك " حساب في كل بيت يمني" ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ]
        ]);

        Principle::create([
            'title' => [
                'ar' => 'المسئولية الاجتماعية',
                'en' => 'Social responsibility'
            ],
            'image' => 'principle-5.png',
            'desc'  => [
                'ar' => 'بنك الكريمي للتمويل الأصغر الإسلامي يمتلك رؤيا أن يكون هناك " حساب في كل بيت يمني" ليسهم في التنمية الاقتصادية والاجتماعية وفي تحسين معيشة الفرد والمجتمع عن طريق خدمات مالية متنوعة ، وبخبرات متراكمة تزيد عن أربعين عاما أسس هذا الصرح الاقتصادي ليقدم خدماته للمواطنين بجميع المحافظات والمدن والمديريات فوصلت خدماتنا من سقطرى إلى صعدة ومن المهرة إلى باب المندب.',
                'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
            ]
        ]);

        FinancialReport::create([
            'name' => [
                'ar' => 'التقارير المالية 2018',
                'en' => 'Financial Report 2018'
            ] ,
            'year' => 2018,
            'file' => 'report.pdf'
        ]);

        FinancialReport::create([
            'name' => [
                'ar' => 'التقارير المالية 2020',
                'en' => 'Financial Report 2020'
            ] ,
            'year' => 2020,
            'file' => 'report.pdf'
        ]);

        FinancialReport::create([
            'name' => [
                'ar' => 'التقارير المالية 2016',
                'en' => 'Financial Report 2016'
            ] ,
            'year' => 2016,
            'file' => 'report.pdf'
        ]);

        FinancialReport::create([
            'name' => [
                'ar' => 'التقارير المالية 2017',
                'en' => 'Financial Report 2017'
            ] ,
            'year' => 2017,
            'file' => 'report.pdf'
        ]);

        FinancialReport::create([
            'name' => [
                'ar' => 'التقارير المالية 2018',
                'en' => 'Financial Report 2018'
            ] ,
            'year' => 2018,
            'file' => 'report.pdf'
        ]);

        FinancialReport::create([
            'name' => [
                'ar' => 'التقارير المالية 2019',
                'en' => 'Financial Report 2019'
            ] ,
            'year' => 2019,
            'file' => 'report.pdf'
        ]);

    }
}
