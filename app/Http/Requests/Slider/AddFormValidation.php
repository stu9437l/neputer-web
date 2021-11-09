<?php

namespace App\Http\Requests\Slider;

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
            'image' => 'required|mimes:jpeg,bmp,png,jpg,gif|max:2047',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Failed to upload an image. The image maximum size is 2MB.',
        ];
    }
}
