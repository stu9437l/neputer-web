<?php

namespace App\Http\Requests\ProductSectionType;

use App\Model\ProductSectionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ProductSectionTypeEditFormValidation extends FormRequest
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

        return [
            'title' => 'required | max:100 | unique:product_section_type,title,' . $this->get('id'),
            'product_section' => 'required'
        ];

    }


}
