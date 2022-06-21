<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrincipleRequest;
use App\Http\Resources\PrincipleResource;
use App\Models\Principle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class PrincipleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principles = Principle::latest()->get();
        return PrincipleResource::collection($principles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrincipleRequest $request)
    {
        $validated = $request->validated();

        if(!$validated) {
            return response()->json([
                'status' => 400,
                'errors' => $validated->messages()
            ]);
        }
        else {
            Principle::create([
                'title' => [
                    'ar' => $request->title_ar,
                    'en' => $request->title_en
                ],
                'desc' => [
                    'ar' => $request->desc_ar,
                    'en' => $request->desc_en
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
        $principle = Principle::find($id);

        if($principle) {
            return response()->json([
                'status'    => 200,
                'principle' => new PrincipleResource($principle),
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
    public function update(PrincipleRequest $request, $id)
    {
        $validated = $request->validated();

        if(!$validated) {
            return response()->json([
                'status' => 400,
                'errors' => $validated->messages()
            ]);
        }
        else {
            $principle = Principle::find($id);
            if($principle) {

                $principle->title = [
                    'ar' => $request->title_ar,
                    'en' => $request->title_en
                ];
                $principle->desc = [
                    'ar' => $request->desc_ar,
                    'en' => $request->desc_en
                ];

                $principle->update();
                return response()->json([
                    'status'    => 200,
                    'message'   => Lang::get('messages.updated_message'),
                    'principle' => $principle
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
        $principle = Principle::find($id);

        if($principle) {
            $principle->delete();
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
        $principle = Principle::find($id);

        if($principle) {
            $principle->update(['is_active' => !$principle->is_active]);
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
