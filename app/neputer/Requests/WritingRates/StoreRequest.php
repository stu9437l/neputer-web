<?php

namespace Neputer\Requests\WritingRates;

use App\Helper\ConfigHelper;
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
            'category_id'           => 'required',
            'standard_rate'         => 'required',
            'status'                => 'required',
            'min_word_count'        => 'required | numeric',
            'word_count_type'       => 'required | in:'.implode(',', ConfigHelper::getConfigByKey('neputer.writing_rates.word_count_types')),
        ];
    }

    public function messages()
    {
        return [
            'word_count_type.in' => 'Invalid word count type passed.',
        ];
    }
}
