<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class AddFormValidation extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048,',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Image size cannot exceed 2MB',
        ];
    }
}
