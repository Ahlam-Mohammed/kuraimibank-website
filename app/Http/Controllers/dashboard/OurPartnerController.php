<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Models\OurPartner;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class OurPartnerController extends Controller
{
    use Uploads;

    public function index()
    {
        $partners = OurPartner::all();
        return view('dashboard.page.manage-our-partner', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_ar'     => 'required|min:5|max:100|string',
            'name_en'     => 'required|min:5|max:100|string',
            'desc_ar'     => 'required|min:5|string',
            'desc_en'     => 'required|min:5|string',
            'image'       => 'required|image|mimes:png,jpg',
        ]);

        $imageName = $this->storeImage($request->file('image'), SettingEnum::PATH_PARTNER_IMAGE);

        if ($imageName) {
            OurPartner::create([
                'name' => [
                    'ar' => $request->input('name_ar'),
                    'en' => $request->input('name_en')
                ],
                'desc' => [
                    'ar' => $request->input('desc_ar'),
                    'en' => $request->input('desc_en')
                ],
                'image' => $imageName,
            ]);
        }

        return redirect()->back()->with('success', \Lang::get('messages.stored_message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar'     => 'required|min:5|max:100|string',
            'name_en'     => 'required|min:5|max:100|string',
            'desc_ar'     => 'required|min:5|string',
            'desc_en'     => 'required|min:5|string',
            'image'       => 'image|mimes:png,jpg',
        ]);

        $partner = OurPartner::find($id);

        if ($partner)
        {
            $imageOldName = $partner->image;

            if ($request->file('image')) {
                $imageName = $this->updateImage($request->file('image'),
                    SettingEnum::PATH_PARTNER_IMAGE, $imageOldName);
            } else {
                $imageName = $imageOldName;
            }

            $partner->name = [
                'ar' => $request->input('name_ar'),
                'en' => $request->input('name_en')
            ];

            $partner->desc = [
                'ar' => $request->input('desc_ar'),
                'en' => $request->input('desc_en')
            ];

            $partner->image = $imageName;

            $partner->update();
            return redirect()->back()->with('success', \Lang::get('messages.updated_message'));
        }
        return redirect()->back()->with('danger', \Lang::get('messages.not_found'));
    }

    public function destroy($id)
    {
        $partner = OurPartner::find($id);
        if ($partner)
        {
            $image = $partner->image;
            $this->deleteImage($image);
            $partner->delete();

            return redirect()->back()->with('success',  Lang::get('messages.deleted_message'));
        }
        return redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }

    public function activate($id)
    {
        $partner = OurPartner::find($id);

        if($partner) {
            $partner->update(['is_active' => !$partner->is_active]);
            return redirect()->back()->with('success',  Lang::get('messages.updated_message'));
        }
        redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }

}
