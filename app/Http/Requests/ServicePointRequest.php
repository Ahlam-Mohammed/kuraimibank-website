<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicePointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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
        ];
    }
}
