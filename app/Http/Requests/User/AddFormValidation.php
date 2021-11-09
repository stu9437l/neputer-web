<?php

namespace App\Http\Requests\User;


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
            'email' => 'required | max:50 | email | unique:users,email',
            'password' => 'required | min:6 | confirmed',
            'first_name' => 'required | max:50',
            'middle_name' => 'max:50',
            'last_name' => 'required | max:50',
            'role' => 'required',
            'image' => 'image',
        ];
    }

}
