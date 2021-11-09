<?php

namespace App\Http\Requests\Career;

use Illuminate\Foundation\Http\FormRequest;

class AddFormValidation extends FormRequest
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
        return [
            'title' => 'required',
            'skills' => 'required',
            'requirement_experience' => 'required',
            'status' => 'required',
            'overview' => 'required',
            'jobType' => 'required',
            'jobLevel' => 'required',
            'company' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'deadline_to_apply' => 'required',

        ];
    }
}
