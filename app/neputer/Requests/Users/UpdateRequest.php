<?php

namespace Neputer\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules =  [
            'name'      => 'required|string|max:191|unique:users,name,'.$this->request->get('id'),
            'email'      => [
                'required',
                'email',
                'unique:users,email,'.$this->get('id'),
                function($attributes, $value, $fail) {

                    if(!auth()->user()->hasRole(config('neputer.user_type.admin.key')) && !auth()->user()->hasVerifiedEmail()) {
                        return $fail('Please verify your email.');
                    }
                }
            ],
            'password'   => 'sometimes|nullable|confirmed|min: 6',
            'image'      => 'sometimes|nullable|max:1024',
            'first_name' => 'required',
            'last_name'  => 'required',
        ];
        if(auth()->user()->hasRole(config('neputer.user_type.admin.key'))) {
            $rules['roles'] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'picked_limit.required' => 'Picked Limit Required for Writer',
        ];
    }
}
