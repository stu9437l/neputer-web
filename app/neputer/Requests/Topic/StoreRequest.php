<?php

namespace Neputer\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [];
        if($request->has('make_issue'))
        {
            $rules = [
                'title' => 'required',
                'slug' => 'required',
            ];
        }

        return array_merge($rules, [
            'writing_rates_id'       => 'required | exists:writing_rates,id',
            'topic'                  => 'required',
        ]);

    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required when topic is make for issue',
            'slug.required' => 'A slug is required when topic is make for issue',
        ];
    }
}
