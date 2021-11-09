<?php

namespace App\Http\Requests\Page;


use Illuminate\Foundation\Http\FormRequest;

class EditFormValidation extends FormRequest
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
        $rules = [
            'title' => 'required|unique:pages,title,'.$this->get('id'),
        ];

        if ($this->get('page_type') == 'content') {
            $rules = array_merge($rules, [
                'content' => 'required',
            ]);
        } else if ($this->get('page_type') == 'link') {
            $rules = array_merge($rules, [
                'link' => 'required',
            ]);
        }

        return $rules;

    }

}
