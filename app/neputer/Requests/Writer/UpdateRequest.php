<?php

namespace Neputer\Requests\Writer;

use Illuminate\Support\Facades\Validator;

class UpdateRequest extends StoreRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->customValidation();
        $rules = [
            'image' => 'image',
            'details' => 'validate_min_words:'.$this->request->get('min_words').' | validate_inc_words',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'details.validate_min_words' => 'Min. words: '.$this->request->get('min_words'),
            'details.validate_inc_words' => 'Words to be included: '.$this->request->get('inc_words'),
        ];
    }

    public function customValidation()
    {
        Validator::extend('validate_min_words', function ($attribute, $value, $parameters, $validator) {
            if($this->request->get('submit')) {
                if (count(explode(' ', $value)) < $parameters[0]) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        });

        Validator::extend('validate_inc_words', function ($attribute, $value, $parameters, $validator) {
            if($this->request->get('submit')) {
                $inc_words_arr = explode(',', $this->request->get('inc_words'));
                foreach ($inc_words_arr as $a) {
                    if (stripos(strip_tags($value), $a) == false) {
                        return false;
                    } else {
                        return true;
                    }
                }
            } else {
                return true;
            }
        });
    }
}
