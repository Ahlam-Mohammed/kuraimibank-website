<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
//    function __construct()
//    {
//        $this->middleware('Permissions:category-list', ['only' => ['index']]);
//        $this->middleware('Permissions:category-create', ['only' => ['store', 'create']]);
//        $this->middleware('Permissions:category-edit', ['only' => ['show', 'update']]);
//        $this->middleware('Permissions:category-delete', ['only' => ['destroy', 'activate']]);
//    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->with('parent')->get();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar'     => 'required|max:191',
            'name_en'     => 'required|max:191',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else {
            $category = Category::create([
                'name' => [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ],
                'category_id' => $request->category_id]);

            !$request->category_id ?: $category->update(['is_branch' => !$category->is_branch]);

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
                'category'=> new CategoryResource($category),
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_ar'     => 'required|max:191',
            'name_en'     => 'required|max:191',
        ]);


        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
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
                    'category' => $category
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

            $branches = Category::where('category_id', $category->id)->get();
            foreach ($branches as $branch) {
                $branch->delete();
            }

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
            $branches = Category::where('category_id', $category->id)->get();
            foreach ($branches as $branch) {
                $branch->update(['is_active' => !$category->is_active]);
            }
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
