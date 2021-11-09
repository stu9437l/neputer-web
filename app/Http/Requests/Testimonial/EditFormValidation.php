<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class EditFormValidation extends AddFormValidation
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'image' => 'sometimes | nullable | mimes:jpeg,jpg,png | max: 2048',
        ]);
    }

    public function messages()
    {
        return [
            'image.max' => 'Max image size is upto 2MB',
        ];
    }

}
