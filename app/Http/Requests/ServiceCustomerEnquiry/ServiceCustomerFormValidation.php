<?php

namespace App\Http\Requests\ServiceCustomerEnquiry;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCustomerFormValidation extends FormRequest
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
            'phone' => 'required | max:14 | min:10',
            'topic' => 'required',
            'message' => 'required',
            'file' => 'mimes:pdf,docx,doc'
        ];
    }
}
