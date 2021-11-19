<?php

namespace Neputer\Requests\Role;

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

            'name' => 'required|unique:roles,name,'.$this->get('id'),
        ]);
    }
}
