<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Service;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use Uploads;

    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('dashboard.page.add-service', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        ##### validator #####
        $this->validate($request, $request->rules());

        $data = [];

        if ($request->hasFile('image'))
        {
//            $file    = $request->file('image');
//            $newName = uniqid() . '.'. $file->extension();
//            $file->storePubliclyAs('public/uploads/services', $newName);
//            $data['image'] = $newName;
            $imageName = $this->storeImage($request->file('image'), 'uploads/services');
        }

        if ($request->hasFile('background'))
        {
//            $file    = $request->file('background');
//            $newName = uniqid() . '.'. $file->extension();
//            $file->storePubliclyAs('public/uploads/services', $newName);
//            $data['background'] = $newName;
            $backgroundName = $this->storeImage($request->file('background'), 'uploads/services');

        }

        if ($imageName && $backgroundName){
            Service::create([
                'name' => [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ],
                'desc' => [
                    'ar' => $request->desc_ar,
                    'en' => $request->desc_en
                ],
                'other_advantage' => [
                    'ar' => $request->other_advantage_ar,
                    'en' => $request->other_advantage_en
                ],
                'service_condition' => [
                    'ar' => $request->service_condition_ar,
                    'en' => $request->service_condition_en
                ],
                'background'  => $backgroundName,
                'image'       => $imageName,
                'category_id' => $request->category_id
            ]);
        }

        return redirect()->route('dashboard.services')->with('success', Lang::get('messages.stored_message'));
    }

//    public function show($id)
//    {
//        $service = Service::find($id);
//        $categories = Category::all();
//
//        if($service) {
//            return view('dashboard.page.edit-service', compact('service', 'categories'));
//        }
//        else {
//            return redirect()->back()->with('danger', Lang::get('messages.not_found'));
//        }
//    }

//    public function update(ServiceRequest $request, $id)
//    {
//        ##### validator #####
//        $this->validate($request, $request->rules());
//
//        $service = Service::find($id);
//
//        if ($request->file('image')) {
//            $imageName = $this->updateImage($request->file('image'),
//                'uploads/services', $service->image);
//        } else {
//            $imageName = $service->image;
//        }
//
//        if ($request->file('background')) {
//            $backgroundName = $this->updateImage($request->file('background'),
//                'uploads/services', $service->background);
//        } else {
//            $backgroundName = $service->background;
//        }
//
//        if($service) {
//            $service->name = [
//                'ar' => $request->name_ar,
//                'en' => $request->name_en
//            ];
//            $service->desc = [
//                'ar' => $request->desc_ar,
//                'en' => $request->desc_en
//            ];
//            $service->other_advantage = [
//                'ar' => $request->other_advantage_ar,
//                'en' => $request->other_advantage_en
//            ];
//            $service->service_condition = [
//                'ar' => $request->service_condition_ar,
//                'en' => $request->service_condition_en
//            ];
//            $service->background  = $backgroundName;
//            $service->image       = $imageName;
//            $service->category_id = $request->category_id;
//
//            $service->update();
//
//            return redirect()->route('dashboard.services')->with('success', Lang::get('messages.updated_message'));
//        }
//        else {
//            return redirect()->back()->with('danger', Lang::get('messages.not_found'));
//
//        }
//    }
}
