<?php

namespace Neputer\Requests\Ads;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class   StoreRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->ad_type == 'banner') {
            $data = [
                'link' => 'required',
                'image' => 'required | image',
                'open_in' => 'required',
            ];
        }

        if ($request->ad_type == 'code') {
            $data = [
                'code' => 'required',

            ];
        }

        $row = array_merge($data, [
            'title' => 'required | max:250 | min:2 | unique:ads,title',
            'ad_type' => 'required',
            'status' => 'required',
        ]);

        return $row;
    }
}
