<?php

namespace Neputer\Requests\Ads;

class UpdateRequest extends StoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'  => 'required | max:250 | min:2',
            'status' => 'required',
            'image' => 'image',
        ];
    }
}
