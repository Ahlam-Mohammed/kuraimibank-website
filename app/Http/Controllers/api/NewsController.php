<?php

namespace App\Http\Controllers\api;

use App\Enum\SettingEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Traits\Uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Lang;

class NewsController extends Controller
{
    use Uploads;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_ar'   => 'required|max:191',
            'title_en'   => 'required|max:191',
            'desc_ar'    => 'required',
            'desc_en'    => 'required',
            'image'      => 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'background' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else {
            if ($request->hasFile('background'))
            {
                $background = $this->storeImage(
                    $request->file('background'), SettingEnum::PATH_NEWS_IMAGE);
            }

            if ($request->hasFile('image'))
            {
                $image = $this->storeImage(
                    $request->file('image'), SettingEnum::PATH_NEWS_IMAGE);
            }

            News::create([
                'title' => [
                    'ar' => $request->title_ar,
                    'en' => $request->title_en
                ],
                'desc' => [
                    'ar' => $request->desc_ar,
                    'en' => $request->desc_en
                ],
                'image'       => $image,
                'background'  => $background
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
