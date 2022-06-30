<?php

namespace App\Http\Controllers\dashboard;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Service;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ServiceController extends Controller
{
    use Uploads;

    function __construct()
    {
        $this->middleware('Permissions:service-list', ['only' => ['index']]);
        $this->middleware('Permissions:service-create', ['only' => ['store', 'create']]);
        $this->middleware('Permissions:service-edit', ['only' => ['edit', 'update']]);
        $this->middleware('Permissions:service-delete', ['only' => ['destroy', 'activate']]);
    }

    public function index()
    {
        $services = Service::latest()->with(['category', 'subCategory'])->get();
        return view('dashboard.page.service.manage-services', compact('services'));
    }

    public function create()
    {
        $categories = Category::where('is_active', 1)->with('parent')->get();
        $categories = CategoryResource::collection($categories);

        return view('dashboard.page.service.add-service', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        ##### validator #####
        $this->validate($request, $request->rules());

        if ($request->hasFile('image'))
        {
            $imageName = $this->storeImage(
                $request->file('image'), SettingEnum::PATH_SERVICE_IMAGE);
        }

        if ($request->hasFile('background'))
        {
            $backgroundName = $this->storeImage(
                $request->file('background'), SettingEnum::PATH_SERVICE_IMAGE);
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
                'position'    => $request->position,
                'category_id' => $request->category_id
            ]);
        }

        return redirect()->route('dashboard.services.index')->with('success', Lang::get('messages.stored_message'));
    }

    public function show(Request $request)
    {
        $service = Service::find($request->id);
        return view('dashboard.page.service.show-service', compact('service'));
    }

    public function edit(Request $request)
    {
        $service    = Service::find($request->id);
//        dd($service);
        $categories = Category::all();
        if($service) {
            return view('dashboard.page.service.edit-service', compact('service', 'categories'));
        }
        else {
            return redirect()->back()->with('danger', Lang::get('messages.not_found'));
        }
    }

    public function update(Request $request, $id)
    {
        ##### validator #####
//        $this->validate($request, $request->rules());

        $service = Service::find($id);

        if ($request->file('image')) {
            $imageName = $this->updateImage($request->file('image'),
                SettingEnum::PATH_SERVICE_IMAGE, $service->image);
        } else {
            $imageName = $service->image;
        }

        if ($request->file('background')) {
            $backgroundName = $this->updateImage($request->file('background'),
                SettingEnum::PATH_SERVICE_IMAGE, $service->background);
        } else {
            $backgroundName = $service->background;
        }

        if($service) {
            $service->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en
            ];
            $service->desc = [
                'ar' => $request->desc_ar,
                'en' => $request->desc_en
            ];
            $service->other_advantage = [
                'ar' => $request->other_advantage_ar,
                'en' => $request->other_advantage_en
            ];
            $service->service_condition = [
                'ar' => $request->service_condition_ar,
                'en' => $request->service_condition_en
            ];
            $service->background  = $backgroundName;
            $service->image       = $imageName;
            $service->category_id = $request->category_id;

            $service->update();

            return redirect()->route('dashboard.services.index')->with('success', Lang::get('messages.updated_message'));
        }
        else {
            return redirect()->back()->with('danger', Lang::get('messages.not_found'));

        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service)
        {
            $image = $service->image;
            $this->deleteImage($image);

            $background = $service->background;
            $this->deleteImage($background);

            $service->delete();

            return redirect()->route('dashboard.services.index')->with('success',  Lang::get('messages.deleted_message'));
        }
        return redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }

    public function activate($id)
    {
        $service = Service::find($id);

        if($service) {
            $service->update(['is_active' => !$service->is_active]);
            return redirect()->back()->with('success',  Lang::get('messages.updated_message'));
        }
        redirect()->back()->with('danger',  Lang::get('messages.not_found'));
    }
}
