<?php

namespace Neputer\Requests\Fact;

class UpdateRequest extends StoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'title'  => 'required | max:100 | min:2 | unique:facts,title,'.$this->request->get('id'),
            'status' => 'required',
        ];
    }
}
