<?php

namespace Neputer\Requests\WriterRates;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends BaseValidation
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
        $this->customValidation();

        return [
            'users_id'              => 'required | exists:users,id',
            'writing_rates_id'      => 'required | check_duplicate_writer_rate | exists:writing_rates,id',
            'status'                => 'required',
            'effective_from_date'   => 'required',
        ];
    }
}
