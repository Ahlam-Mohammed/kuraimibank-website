<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\WebInfoEnum;
use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\WebInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ContactInfoController extends Controller
{
    //********* Get Social *********//
    public function indexSocial()
    {
        $facebook  = ContactInfo::where('key', WebInfoEnum::FACEBOOK)->first();
        $twitter   = ContactInfo::where('key', WebInfoEnum::TWITTER)->first();
        $whatsapp  = ContactInfo::where('key', WebInfoEnum::WHATSAPP)->first();
        $instagram = ContactInfo::where('key', WebInfoEnum::INSTAGRAM)->first();
        $google    = ContactInfo::where('key', WebInfoEnum::GOOGLE)->first();

//        return $facebook->value;
        return view('dashboard.page.manage_web_info.social',
            compact('facebook', 'twitter', 'whatsapp', 'instagram', 'google'));
    }

    //********* Update Social *********//
    public function updateSocial(Request $request)
    {
        !isset($request->facebook) ?:
            ContactInfo::updateOrCreate(['key' => WebInfoEnum::FACEBOOK],[
                'value' => $request->facebook
            ]);

        !isset($request->twitter) ?:
            ContactInfo::updateOrCreate(['key' => WebInfoEnum::TWITTER],[
                'value' => $request->twitter
            ]);

        !isset($request->whatsapp) ?:
            ContactInfo::updateOrCreate(['key' => WebInfoEnum::WHATSAPP],[
                'value' => $request->whatsapp
            ]);

        !isset($request->google) ?:
            ContactInfo::updateOrCreate(['key' => WebInfoEnum::GOOGLE],[
                'value' => $request->google
            ]);

        !isset($request->instagram) ?:
            ContactInfo::updateOrCreate(['key' => WebInfoEnum::INSTAGRAM],[
                'value' => $request->instagram
            ]);

        return redirect()->back()->with('success', Lang::get('messages.updated_message'));
    }
}
