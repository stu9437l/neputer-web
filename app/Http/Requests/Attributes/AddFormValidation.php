<?php

namespace App\Http\Requests\Attributes;

use App\Model\Attributes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

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
        $this->customRules();

        return [
            'title' => 'required | group_title',
            'status' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'title.group_title' => 'You must give unique title for same group.',
            'slug.group_slug' => 'You should unique slug name for same group.',
        ];
    }

    protected function customRules()
    {
        Validator::extend('group_title', function ($attribute, $value, $parameters, $validator) {
            $group_id = $this->request->get('group_id');
            if ($group_id) {
                $data = [];
                $data['rows'] = Attributes::Select('title')->where('group_id', $group_id)->get();
                $data['title'] = $data['rows']->pluck('title');
                if ($data['title']) {
                    foreach ($data['title'] as $title) {
                        // dd($this->request->get('title'));
                        if ($value == $title) {
                            return false;
                        }

                    }
                }

            }

            return true;
        });
        Validator::extend('group_slug', function ($attribute, $value, $parameters, $validator) {
            $group_id = $this->request->get('group_id');
            $status = true;
            if ($group_id) {
                $data = [];
                $data['rows'] = Attributes::Select('slug')->where('group_id', $group_id)->get();
                $data['slug'] = $data['rows']->pluck('slug');
                if ($data['slug']) {
                    foreach ($data['slug'] as $slug) {
                        if ($value == $slug) {
                            return false;
                        }

                    }
                }
            }
            return true;
        });
    }
}
