<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title_ar'   => 'required|max:191',
            'title_en'   => 'required|max:191',
            'desc_ar'    => 'required',
            'desc_en'    => 'required',
            'image'      => 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'background' => 'required|image|mimes:jpeg,jpg,png,svg|max:2048',

        ];
    }
}
