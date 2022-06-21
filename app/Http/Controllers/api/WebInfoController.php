<?php

namespace App\Http\Controllers\api;

use App\Enum\WebInfoEnum;
use App\Http\Controllers\Controller;
use App\Models\WebInfo;
use Illuminate\Http\Request;

class WebInfoController extends Controller
{
    //********* Get About *********//
    public function indexAbout()
    {
        $about = WebInfo::where('key', WebInfoEnum::ABOUT)->first();
        return view('dashboard.page.manage_web_info.about', compact('about'));
    }

    //********* Update About *********//
    public function updateAbout(Request $request)
    {
        WebInfo::updateOrCreate(['key' => WebInfoEnum::ABOUT],[
            'value' => [
                'ar' => $request->about_ar,
                'en' => $request->about_en
            ]
        ]);

        return redirect()->back();
    }

    //********* Get Vision *********//
    public function indexVision()
    {
        $vision = WebInfo::where('key', WebInfoEnum::VISION)->first();
        return view('dashboard.page.manage_web_info.vision', compact('vision'));
    }

    //********* Update Vision *********//
    public function updateVision(Request $request)
    {
        WebInfo::updateOrCreate(['key' => WebInfoEnum::VISION],[
            'value' => [
                'ar' => $request->vision_ar,
                'en' => $request->vision_en
            ]
        ]);

        return redirect()->back();
    }

    //********* Get Strategy *********//
    public function indexStrategy()
    {
        $strategy = WebInfo::where('key', WebInfoEnum::STRATEGY)->first();
        return view('dashboard.page.manage_web_info.strategy', compact('strategy'));
    }

    //********* Update Strategy *********//
    public function updateStrategy(Request $request)
    {
        WebInfo::updateOrCreate(['key' => WebInfoEnum::STRATEGY],[
            'value' => [
                'ar' => $request->strategy_ar,
                'en' => $request->strategy_en
            ]
        ]);

        return redirect()->back();
    }
}
