<?php
namespace App\Http\Requests\ContactUs;
use \Illuminate\Foundation\Http\FormRequest;

class ContactUsValidation extends FormRequest
{
    public function authorize()
    {
        return true;
     }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'phone' => 'required| max:14 | min:10',
            'tac' => 'accepted',
        ];
     }
}