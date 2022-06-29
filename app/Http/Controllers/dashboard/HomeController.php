<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\ExchangeRate;
use App\Models\News;
use App\Models\ServicePoint;

class HomeController extends Controller
{
    //********* Home Dashboard Page *********//
    public function index()
    {
        return view('dashboard.page.index');
    }

    //********* Categories Management Page *********//
    public function categories()
    {
        $categories = Category::latest()->get();
        return view('dashboard.page.manage-categories', compact('categories'));
    }

    //********* Cities & Countries Management Page *********//
    public function regions()
    {
        $countries = Country::latest()->get();
        $cities    = City::latest()->get();
        return view('dashboard.page.manage-regions', compact('cities', 'countries'));
    }

    //********* Exchange Rates Management Page *********//
    public function rates()
    {
        $rates = ExchangeRate::latest()->get();
        return view('dashboard.page.manage-exchange-rate', compact('rates'));
    }

    //********* News Management Page *********//
    public function news()
    {
        $news = News::latest()->get();
        return view('dashboard.page.manage-news', compact('news'));
    }

    //********* Service Points Management Page *********//
    public function servicePoint()
    {
        $cities    = City::where('is_active', 1)->get();
        $points    = ServicePoint::whereBelongsTo($cities)->latest()->get();
        return view('dashboard.page.manage-service-points', compact('points'));
    }
}

