<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = SubCategory::latest()->get();
        return SubCategoryResource::collection($branches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        SubCategory::create([
            'name' => [
                'ar' => $request->name_ar,
                'en' => $request->name_en
            ],
            'category_id' => $request->category_id]);

        return response()->json([
            'status'  => 200,
            'message' => Lang::get('messages.stored_message')
        ]);
//        $validated = $request->validated();
//
//        if(!$validated) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validated->messages()
//            ]);
//        }
//        else {
//            SubCategory::create([
//                'name' => [
//                    'ar' => $request->name_ar,
//                    'en' => $request->name_en
//                ],
//                'category_id' => $request->category_id]);
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
        $branch = SubCategory::find($id);

        if($branch) {
            return response()->json([
                'status'=>200,
                'branch'=> new SubCategoryResource($branch),
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
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();

        if(!$validated) {
            return response()->json([
                'status' => 400,
                'errors' => $validated->messages()
            ]);
        }
        else {
            $branch = SubCategory::find($id);
            if($branch) {
                $branch->name = [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ];

                $branch->category_id = $request->category_id;

                $branch->update();
                return response()->json([
                    'status'  => 200,
                    'message' => Lang::get('messages.updated_message'),
                    'branch' => $branch
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $branch = SubCategory::find($id);

        if($branch) {
            $branch->delete();
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
        $branch = SubCategory::find($id);

        if($branch) {
            $branch->update(['is_active' => !$branch->is_active]);
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
