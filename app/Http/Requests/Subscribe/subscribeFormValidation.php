<?php


namespace App\Http\Requests\Subscribe;


use Illuminate\Foundation\Http\FormRequest;

class subscribeFormValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }

}