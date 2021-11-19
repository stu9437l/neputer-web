<?php

namespace Neputer\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image'
        ];


        return $rules;
    }

    public function messages()
    {
        return [
            'picked_limit.required' => 'Picked Limit Required for Writer',
        ];
    }

}
