<?php

namespace App\Http\Controllers\Shop;

use App\Facades\AppHelperFacade;
use App\Mail\Contact;
use App\Mail\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Model\Contact as ContactUs;


class ContactUsController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['settings'] = AppHelperFacade::getSiteConfiguration();
        return view('shop.pages.contact-us.index', compact('data'));
    }

    /**
     * @param Request $request
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            $contact = ContactUs::create($request->except('_token'));
            if($contact){
                Mail::to($contact->email)->send(new ContactInfo($contact));
                return back()->with('success-message', 'Your message has been received. We will get back to you soon.');
            }
        } catch (\Exception $exception) {
            return back()->with('error-message', 'Opps! something went wrong. Please try again.');
        }

    }

}
