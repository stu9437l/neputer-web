<?php

namespace Neputer\Requests\Category;

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
            'title'  => 'required | max:250 | min:2 | unique:category,title,'.$this->request->get('id'),
            'status' => 'required',
        ];
    }
}
