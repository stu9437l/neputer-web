<?php

namespace App\Http\Requests\User;

use App\Model\Role;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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

        $this->customValidationRules();

        $rules = [
            'email' => 'required | max:50 | email | unique:users,email,'.$this->request->get('id'),
            'first_name' => 'required | max:50',
            'middle_name' => 'max:50',
            'last_name' => 'required | max:50',
            'role' => 'required | root_user_validation_rule',
            'image' => 'image'

        ];

        //optional validation rules for password
        if($this->request->get('password')){
            $rules = array_merge($rules, [
                'password' => 'min:6 | confirmed',
            ]);
        }

//        dd($rules);

        return $rules;
    }

    public function messages()
    {
        return [
          'role.root_user_validation_rule' => 'You Need To Select Super Admin For Root User And Other Roles Are Optional',
        ];
    }

    protected function customValidationRules(){

        Validator::extend('rootUserValidationRule', function ($attribute, $value, $parameters, $validator) {

            $user_id = $this->request->get('id');
            $root_user = User::orderBy('id', 'asc')->first();
            $roles = $value;

            if($user_id == $root_user->id)
            {

                $super_admin = Role::where('slug', 'super-admin')->first();

                if(!in_array($super_admin->id, $roles)){
                    return false;
                }

                return true;

            }

            return true;

        });

    }


}
