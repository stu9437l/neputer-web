<?php

namespace App\Http\Requests\ProductSectionType;

use App\Model\OfferType;
use App\Model\ProductSectionType;
use App\Models\SpecialOffer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class ProductSectionTypeAddFormValidation extends FormRequest
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

        $this->customValidationRules();

        $rules =  [
            'title' => 'required | max:100 | unique:product_section_type,title',
            'product_section' => 'required | product_section_validation_rule'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'product_section.product_section_validation_rule' => 'The Selected Offer Section Already Exists'
        ];
    }

    protected function customValidationRules(){

        Validator::extend('ProductSectionValidationRule', function ($attribute, $value, $parameters, $validator) {

            $product_section = $value;

            if(ProductSectionType::where('product_section', $product_section)->count() > 0){
                return false;
            }

            return true;

        });
    }
}
