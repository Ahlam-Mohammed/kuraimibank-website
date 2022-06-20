<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name_ar'              => 'required|max:191',
            'name_en'              => 'required|max:191',
            'desc_ar'              => 'required',
            'desc_en'              => 'required',
            'other_advantage_ar'   => 'nullable',
            'other_advantage_en'   => 'required_with:other_advantage_ar',
            'service_condition_ar' => 'nullable',
            'service_condition_en' => 'required_with:service_condition_ar',
            'image'                => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'background'           => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',
            'category_id'          => 'required'

        ];
    }
}
