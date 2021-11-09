<?php

namespace App\Http\Requests\Attributes;

use App\Models\Attributes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
        $this->customRule();
        return [
            'title' => 'required | unique:attributes,group_id, | update_rule',
            'status' => 'required'
        ];
    }

    public function messages()
    {

        return [
            'title.update_rule' => 'You must give unique title for same group.',
        ];
    }

    public function customRule()
    {
        Validator::extend('update_rule', function ($attribute, $value, $parameters, $validator) {

            $group_id = $this->request->get('group_id');
            $row_id = $this->request->get('id');
            if ($group_id) {
                $data = [];
                $data['rows'] = \App\Model\Attributes::Select('title', 'id')->where('group_id', $group_id)->get();
                $data['title'] = $data['rows']->pluck('title', 'id');
                if ($data['title']) {
                    foreach ($data['title'] as $id => $title)

                        if ($value == $title && $id != $row_id) {
                            return false;
                        }

                }
                return true;

            }
            return true;
        });
    }
}

