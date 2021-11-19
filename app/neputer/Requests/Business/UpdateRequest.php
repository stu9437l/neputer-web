<?php

namespace Neputer\Requests\Business;

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
            'business_name' => 'required | unique:businesses,business_name,'.$this->request->get('id'),
            'type' => 'required',
            'email' => 'required | unique:businesses,email,'.$this->request->get('id'),
        ];
    }
}
