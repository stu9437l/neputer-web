<?php

namespace App\Http\Requests\IndustriesWeWorkFor;
use \Illuminate\Foundation\Http\FormRequest;

class IndustriesWeWorkForValidation extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required | mimes:jpeg,jpg,png,svg',
            'title' => 'required | max:40 ',
            'link' =>   'required',
            'status' => 'required'
        ];
    }
}