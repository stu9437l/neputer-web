<?php

namespace App\Http\Requests\offerType;

use App\Model\OfferType;
use App\Models\SpecialOffer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class OfferAddFormValidation extends FormRequest
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
            'title' => 'required | max:100',
            'slug' => 'required',
            'offer_section' => 'required | offer_section_validation_rule'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'offer_section.offer_section_validation_rule' => 'The Selected Offer Section Already Exists'
        ];
    }

    protected function customValidationRules(){

        Validator::extend('offerSectionValidationRule', function ($attribute, $value, $parameters, $validator) {

            $offer_section = $value;

            if(OfferType::where('offer_section', $offer_section)->count() > 0){
                return false;
            }

            return true;

        });
    }
}
