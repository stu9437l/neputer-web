<?php


namespace Neputer\Requests\Slider;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

//        dd($this->get('id'));
        return [
            'img_text'            =>'required',
            'photo'            =>'image | mimes:jpg,png,jpeg,'.$this->get('id'),
            'status'           =>'required',
        ];
    }
}
