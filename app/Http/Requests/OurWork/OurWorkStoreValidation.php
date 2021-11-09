<?php


namespace App\Http\Requests\OurWork;


use Illuminate\Foundation\Http\FormRequest;

class OurWorkStoreValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpeg,jpg',
        ];
    }
}