<?php

namespace App\Http\Requests\IndustriesWeWorkFor;
use \Illuminate\Foundation\Http\FormRequest;

class IndustriesWeWorkForUpdateValidation extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required | max:40 ',
            'link' => 'required',
            'status' => 'required'
        ];
    }
}