<?php


namespace App\Http\Requests\OurTeam;

use \Illuminate\Foundation\Http\FormRequest;

class OurTeamFormValidation extends FormRequest {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'name' =>'required',
          'role'=>'required',
        ];
    }

}