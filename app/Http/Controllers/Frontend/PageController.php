<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Contact;
use App\Model\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PageController
{
    protected $view_path = 'frontend.page';

    public function menu($menu)
    {
        $data = [];
        $data['row'] = Pages::select('title','content','page_image','seo_title','seo_desc','seo_keywords')->where('slug',$menu)->first();
        if(!$data['row']){
             session()->flash( 'Invalid request.');
            return redirect()->route('home');
        }

        return view($this->view_path.'.index', compact('data'));
    }

    public function contactUs()
    {

        return view($this->view_path.'.contact_us');
    }

    public function contactUsPost(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'full_name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        if ( $validator->fails() ) {
             session()->flash('Invalid Data!! Please enter valid data and submit again');
            return redirect()->back();
        }else{
            $data = $request->all();
            $check = Contact::create($data);

            if($check){
                 session()->flash('Thanks for contacting us !!!');
                return redirect()->back();
            }
        }

    }

    public function termsConditions()
    {
        return view(parent::loadDataToView($this->view_path.'.terms_condition'));
    }
}
