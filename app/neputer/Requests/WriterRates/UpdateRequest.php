<?php

namespace Neputer\Requests\WriterRates;

class UpdateRequest extends BaseValidation
{

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
            'effective_from_date'   => 'required | date',
        ];
    }
}
