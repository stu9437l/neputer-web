<?php

namespace Neputer\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'writing_rates_id'       => 'exists:writing_rates,id',
            'topic'                  => 'required',
            'title'                  => 'required',
            'image'                  => 'image',
        ];
    }
}
