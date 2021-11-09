<?php


namespace App\Http\Requests\WhyUs;


use Illuminate\Foundation\Http\FormRequest;

class WhyUsFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'images' => 'mimes:jpeg,png,jpg',
        ];
    }

}