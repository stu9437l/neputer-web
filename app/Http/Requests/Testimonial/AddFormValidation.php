<?php

namespace App\Http\Requests\Testimonial;

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
            'testimonial_by' => 'required',
            'testimonial' => 'required',
            'file' => 'required | mimes:jpeg,png,jpg,bmp,svg | max: 2048',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Max image size is upto 2MB',
        ];
    }
}
