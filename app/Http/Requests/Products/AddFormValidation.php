<?php

namespace App\Http\Requests\Products;

use App\Model\Category;
use App\Model\Product;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;



class AddFormValidation extends FormRequest
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
        $this->customRules();

        return [
            'category_id' => 'required | check_category',
            'title' => 'required | max:50',
            'slug' => 'required | check_slug',
            'new_price' => 'required | min:1',
            'quantity' => 'required | min:0',
            'image'  => 'required | image',
            'status' => 'required | in:1, 0',
            'user_id' => 'required | check_seller',
            'seo_title' => 'max:50'
        ];

    }

    public function messages()
    {
        return [
            'category_id.check_category' => 'Please select the valid category',
            'slug.check_slug' => 'Slug is not valid',
            'user_id.check_seller' => 'Seller is not valid',
        ];
    }

    protected function customRules(){

        Validator::extend('checkCategory', function ($attribute, $value, $parameters, $validator) {
            if(Category::find($value)){
                return true;
            }

            return false;
        });

        Validator::extend('checkSlug', function ($attribute, $value, $parameters, $validator) {

            $slug = $value;
            $category_id = $this->request->get('category_id');

            if(Product::where('category_id', $category_id)->where('slug', $slug)->count() == 0){
                return true;
            }

            return false;
        });

        Validator::extend('checkSeller', function ($attribute, $value, $parameters, $validator) {

            if(User::find($value)){
                return true;
            }

            return false;
        });
    }


}
