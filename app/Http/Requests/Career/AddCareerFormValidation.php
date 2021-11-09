<?php

namespace App\Http\Requests\Career;

use Illuminate\Foundation\Http\FormRequest;

class AddCareerFormValidation extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required | min:10 | max:14',
            'need' => 'required',
            'message' => 'required',
            'file' => 'mimes:pdf,docx,doc'
        ];
    }
}
