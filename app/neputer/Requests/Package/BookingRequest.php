<?php

namespace Neputer\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
//        dd($this->all());
        return [
            'first_name' => 'required',
            'email' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'package_id' => 'required',
            'arrival_date' => 'required|date',
//            'departure_date' => 'date'

        ];
    }
}
