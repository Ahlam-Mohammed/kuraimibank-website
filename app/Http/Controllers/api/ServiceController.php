<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->with(['category', 'subCategory'])->get();
        return ServiceResource::collection($services);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
//        $validated = $request->validated();
//
//        if(!$validated) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validated->messages()
//            ]);
//        }
//        else {
//            Category::create([
//                'name' => [
//                    'ar' => $request->name_ar,
//                    'en' => $request->name_en
//                ]]);
//
//            return response()->json([
//                'status'  => 200,
//                'message' => Lang::get('messages.stored_message')
//            ]);
//        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//        $category = Category::find($id);
//
//        if($category) {
//            return response()->json([
//                'status'=>200,
//                'category'=> new CategoryResource($category),
//            ]);
//        }
//        else {
//            return response()->json([
//                'status'  => 404,
//                'message' => Lang::get('messages.not_found')
//            ]);
//        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, $id)
    {
//        $validated = $request->validated();
//
//        if(!$validated) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validated->messages()
//            ]);
//        }
//        else {
//            $category = Category::find($id);
//            if($category) {
//                $category->name = [
//                    'ar' => $request->name_ar,
//                    'en' => $request->name_en
//                ];
//
//                $category->update();
//                return response()->json([
//                    'status'  => 200,
//                    'message' => Lang::get('messages.updated_message'),
//                    'category' => $category
//                ]);
//            }
//            else {
//                return response()->json([
//                    'status'  => 404,
//                    'message' => Lang::get('messages.not_found')
//                ]);
//            }
//        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::find($id);

        if($service) {
            $service->delete();
            return response()->json([
                'status'  => 200,
                'message' => Lang::get('messages.deleted_message')
            ]);
        }
        else {
            return response()->json([
                'status'  => 404,
                'message' => Lang::get('messages.not_found')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function activate($id)
    {
        $service = Service::find($id);

        if($service) {
            $service->update(['is_active' => !$service->is_active]);
            return response()->json([
                'status'  => 200,
                'message' => Lang::get('messages.updated_message')
            ]);
        }
        else {
            return response()->json([
                'status'  => 404,
                'message' => Lang::get('messages.not_found')
            ]);
        }
    }
}
