<?php

namespace App\Http\Controllers\frontend;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Models\ExchangeRate;
use App\Models\News;
use App\Models\Service;
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
}
