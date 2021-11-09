<?php


namespace App\Http\Requests\DevelopmentProcess;


use Illuminate\Foundation\Http\FormRequest;

class DevelopmentProcessValidation extends FormRequest
{
    /**
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required | mimes:jpg,jpeg,png',
            'title'=> 'required',
            'description' => 'required'
        ];
    }

}