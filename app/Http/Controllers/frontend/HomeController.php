<?php

namespace App\Http\Controllers\frontend;

use App\Enum\SettingEnum;
use App\Enum\WebInfoEnum;
use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\ExchangeRate;
use App\Models\FinancialReport;
use App\Models\News;
use App\Models\Principle;
use App\Models\Service;
use App\Models\WebInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $rates    = ExchangeRate::where('is_active', 1)->get();
        $services = Service::where('is_active', 1)
            ->where('position', SettingEnum::POSITION_HOME_MAIN)->get();
        $news  = News::where('is_active', 1)->get();

        return view('frontend.index',
            compact('services', 'rates', 'news'));
    }

    public function detailsService($id)
    {
        $service = Service::where('id', $id)->where('is_active', 1)->first();
        if ($service) return view('frontend.pages.service.index', compact('service'));
        return response('404');
    }

    public function successStory($id)
    {
        $story = [
            'title' => 'مشروع تحديث أنظمة البنك',
            'desc'  => '',
            'image' => 'story-1.png'
        ];

        $news  = News::where('is_active', 1)->get();

        return view('frontend.pages.successStory.index', compact('story', 'news'));
    }

    public function contactUs()
    {
        $tel      = ContactInfo::where('key', WebInfoEnum::TEL)->first();
        $tollFree = ContactInfo::where('key', WebInfoEnum::TOLL_FREE)->first();
        $fax      = ContactInfo::where('key', WebInfoEnum::FAX)->first();
        $box      = ContactInfo::where('key', WebInfoEnum::P_O_BOX)->first();
        $email    = ContactInfo::where('key', WebInfoEnum::EMAIL)->first();

        return view('frontend.pages.contact-us',
        compact('tel', 'tollFree', 'fax', 'box', 'email'));
    }

    public function aboutUs()
    {
        $about    = WebInfo::where('key', WebInfoEnum::ABOUT)->first();
        $vision   = WebInfo::where('key', WebInfoEnum::VISION)->first();
        $strategy = WebInfo::where('key', WebInfoEnum::STRATEGY)->first();
        $principles = Principle::where('is_active', 1)->get();

        return view('frontend.pages.about.index',
        compact('about', 'vision', 'strategy', 'principles'));
    }

    public function partner(){
        return view('frontend.pages.partner.index');
    }

    public function adminMembers()
    {
        return view('frontend.pages.admin-members');
    }

    public function report()
    {
        $reports = FinancialReport::where('is_active', 1)->get();
        return view('frontend.pages.report', compact('reports'));
    }
}
