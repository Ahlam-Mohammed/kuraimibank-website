<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->get();
        return NewsResource::collection($news);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $validated = $request->validated();

        if(!$validated) {
            return response()->json([
                'status' => 400,
                'errors' => $validated->messages()
            ]);
        }
        else {
            News::create([
                'title' => [
                    'ar' => $request->title_ar,
                    'en' => $request->title_en
                ],
                'desc' => [
                    'ar' => $request->desc_ar,
                    'en' => $request->desc_en
                ],
                'image'       => '$request->image',
                'background'  => '$request->background'
            ]);

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
        $news = News::find($id);

        if($news) {
            return response()->json([
                'status' => 200,
                'news'   => new NewsResource($news),
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
    public function update(NewsRequest $request, $id)
    {
        $validated = $request->validated();

        if(!$validated) {
            return response()->json([
                'status' => 400,
                'errors' => $validated->messages()
            ]);
        }
        else {
            $news = News::find($id);
            if($news) {
                $news->title = [
                    'ar' => $request->title_ar,
                    'en' => $request->title_en
                ];
                $news->desc = [
                    'ar' => $request->desc_ar,
                    'en' => $request->desc_en
                ];

                $news->image       = '$request->image';
                $news->background  = '$request->background';

                $news->update();
                return response()->json([
                    'status'  => 200,
                    'message' => Lang::get('messages.updated_message'),
                    'news'    => $news
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
        $news = News::find($id);

        if($news) {
            $news->delete();
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
        $news = News::find($id);

        if($news) {
            $news->update(['is_active' => !$news->is_active]);
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
