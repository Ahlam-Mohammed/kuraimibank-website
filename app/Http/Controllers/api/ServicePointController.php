<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePointRequest;
use App\Http\Resources\ServicePointResource;
use App\Models\City;
use App\Models\ServicePoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class ServicePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities    = City::where('is_active', 1)->get();
        $points    = ServicePoint::whereBelongsTo($cities)->latest()->get();
        return ServicePointResource::collection($points);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar'          => 'required|max:191',
            'name_en'          => 'required|max:191',
            'address_ar'       => 'required|max:191',
            'address_en'       => 'required|max:191',
            'working_hours_ar' => 'required|max:191',
            'working_hours_en' => 'required|max:191',
            'phone'            => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:6|max:19',
            'second_phone'     => 'nullable|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:6|max:19',
            'category'         => 'required',
            'city_id'          => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else {
            ServicePoint::create([
                'name' => [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ],
                'address' => [
                    'ar' => $request->address_ar,
                    'en' => $request->address_en
                ],
                'working_hours' => [
                    'ar' => $request->working_hours_ar,
                    'en' => $request->working_hours_en

                ],
                'phone'        => $request->phone,
                'second_phone' => $request->second_phone,
                'category'     => $request->category,
                'city_id'      => $request->city_id
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
        $point = ServicePoint::find($id);

        if($point) {
            return response()->json([
                'status'        => 200,
                'service_point' => new ServicePointResource($point),
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
            'name_ar'          => 'required|max:191',
            'name_en'          => 'required|max:191',
            'address_ar'       => 'required|max:191',
            'address_en'       => 'required|max:191',
            'working_hours_ar' => 'required|max:191',
            'working_hours_en' => 'required|max:191',
            'phone'            => 'required|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:6|max:19',
            'second_phone'     => 'nullable|regex:/^([0-9]*)$/|not_regex:/[a-z]/|min:6|max:19',
            'category'         => 'required',
            'city_id'          => 'required'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else {
            $point = ServicePoint::find($id);
            if($point) {
                $point->name = [
                    'ar' => $request->name_ar,
                    'en' => $request->name_en
                ];

                $point->address = [
                    'ar' => $request->address_ar,
                    'en' => $request->address_en
                ];

                $point->working_hours = [
                    'ar' => $request->working_hours_ar,
                    'en' => $request->working_hours_en
                ];

                $point->phone        = $request->phone;
                $point->second_phone = $request->second_phone;
                $point->category     = $request->category;
                $point->city_id      = $request->city_id;

                $point->update();

                return response()->json([
                    'status'        => 200,
                    'message'       => Lang::get('messages.updated_message'),
                    'service_point' => $point
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
        $point = ServicePoint::find($id);

        if($point) {
            $point->delete();
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
        $point = ServicePoint::find($id);

        if($point) {
            $point->update(['is_active' => !$point->is_active]);
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
