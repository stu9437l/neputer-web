<?php

namespace App\Http\Requests\CompanyStory;

use Illuminate\Foundation\Http\FormRequest;

class EditFormValidation extends AddFormValidation
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [

        ]);
    }
}
