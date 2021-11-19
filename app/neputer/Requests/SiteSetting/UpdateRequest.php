<?php

namespace Neputer\Requests\SiteSetting;

class UpdateRequest extends StoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            'image' => 'image',
        ]);
    }
}
