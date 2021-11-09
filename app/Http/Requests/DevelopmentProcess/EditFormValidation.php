<?php


namespace App\Http\Requests\DevelopmentProcess;


use Illuminate\Foundation\Http\FormRequest;

class EditFormValidation extends FormRequest
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

        ];
    }

}