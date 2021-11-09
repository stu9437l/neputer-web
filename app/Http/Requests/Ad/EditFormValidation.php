<?php

namespace App\Http\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;

class EditFormValidation extends FormRequest
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
        $rules = [
            'title' => 'required | unique:ads,title,'.$this->get('id'),
        ];

        if ($this->get('ad_type') == 'banner') {
            $rules = array_merge($rules, [
                'image' => 'sometimes | nullable | image | mimes:jpeg,jpg,png,gif,svg | max:2047',
            ]);
        } else if ($this->get('ad_type') == 'script') {
            $rules = array_merge($rules, [
                'content' => 'required',
            ]);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'image.max' => 'Failed to upload an image. The image maximum size is 2MB.',
        ];
    }
}
