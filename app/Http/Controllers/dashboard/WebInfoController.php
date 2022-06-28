<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\WebInfoEnum;
use App\Http\Controllers\Controller;
use App\Models\WebInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class WebInfoController extends Controller
{
    //********* Get About *********//
    public function indexAbout()
    {
        $about = WebInfo::where('key', WebInfoEnum::ABOUT)->first();
        return view('dashboard.page.web_info.about', compact('about'));
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

        return redirect()->back()->with('success', Lang::get('messages.updated_message'));
    }

    //********* Get Vision *********//
    public function indexVision()
    {
        $vision = WebInfo::where('key', WebInfoEnum::VISION)->first();
        return view('dashboard.page.web_info.vision', compact('vision'));
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

        return redirect()->back()->with('success', Lang::get('messages.updated_message'));
    }

    //********* Get Strategy *********//
    public function indexStrategy()
    {
        $strategy = WebInfo::where('key', WebInfoEnum::STRATEGY)->first();
        return view('dashboard.page.web_info.strategy', compact('strategy'));
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

        return redirect()->back()->with('success', Lang::get('messages.updated_message'));
    }

    //********* Get Principles *********//
    public function indexPrinciple()
    {
        return view('dashboard.page.web_info.principle');
    }

    //********* Get Privacy policy *********//
    public function indexPolicy()
    {
        $policy = WebInfo::where('key', WebInfoEnum::POLICY)->first();
        return view('dashboard.page.web_info.privacy-policy', compact('policy'));
    }

    //********* Update Privacy policy *********//
    public function updatePolicy(Request $request)
    {
        WebInfo::updateOrCreate(['key' => WebInfoEnum::POLICY],[
            'value' => [
                'ar' => $request->policy_ar,
                'en' => $request->policy_en
            ]
        ]);

        return redirect()->back()->with('success', Lang::get('messages.updated_message'));
    }
}
