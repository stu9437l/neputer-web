<?php

namespace Neputer\Requests\Package;

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
            'title' => 'required | unique:packages,title',
            'photo' => 'required|image',
            'min_seat_available' => 'required',
            'max_seat_available' => 'required',
            'price' => 'required',
            'destination_id' => 'required',
            'duration_id' => 'required',
            'grade_id' => 'required',
            'activity_id' => 'required',
        ];
    }
}
