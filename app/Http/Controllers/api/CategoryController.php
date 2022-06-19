<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        if(!$validated) {
            return response()->json([
                'status' => 400,
                'errors' => $validated->messages()
            ]);
        }
        else {
            Category::create([
                'name' => [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ]]);

            return response()->json([
                'status'  => 200,
                'message' => Lang::get('messages.stored_message')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);

        if($category) {
            return response()->json([
                'status'=>200,
                'country'=> new CategoryResource($category),
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
            $category = Category::find($id);
            if($category) {
                $category->name = [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ];

                $category->update();
                return response()->json([
                    'status'  => 200,
                    'message' => Lang::get('messages.updated_message'),
                    'country' => $category
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
        $category = Category::find($id);

        if($category) {
            $category->delete();
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
        $category = Category::find($id);

        if($category) {
            $category->update(['is_active' => !$category->is_active]);
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
