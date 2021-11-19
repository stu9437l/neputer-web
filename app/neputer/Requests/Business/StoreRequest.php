<?php

namespace Neputer\Requests\Business;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'business_name' => 'required | unique:businesses,business_name',
            'type' => 'required',
            'email' => 'required | unique:businesses,email',
        ];
    }
}
