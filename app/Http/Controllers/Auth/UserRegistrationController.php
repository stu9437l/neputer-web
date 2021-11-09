<?php

namespace App\Http\Controllers\Auth;

use App\Facades\AppHelperFacade;
use App\Http\Requests\UserRegister\AddFormValidation;
use App\Http\Controllers\Controller;
use App\Mail\UserRegistraion;
use App\Model\Role;
use App\Model\UserDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserRegistrationController extends Controller
{
    public function register(AddFormValidation $request)
    {
        $user = User::create([
            'name' => $request->get('email'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'status' => 0,
            'verification_token' => AppHelperFacade::getUserVerificationToken()
        ]);
        UserDetails::create([
            'user_id' => $user->id,
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'gender' => $request->get('gender')
        ]);

        //assign role to the customer
        $customer_role = Role::where('slug', 'customer')->first();
        $user->roles()->attach($customer_role->id);

        //send verification link to email for verification of account
        Mail::to($user->email)->send(new UserRegistraion($user));

        return view('shop.auth.verify_email');
    }

    public function customerVerification(Request $request)
    {

        //check if the token is valid
        $user = User::where('verification_token', $request->get('verification-token'))->first();

        if($user){

            //che ck if verification token is already used
            if(!$user->status){

                $user->status = 1;
                $user->verification_token = AppHelperFacade::getUserVerificationToken();
                $user->save();

                $request->session()->flash('success-message', 'Your account is successfully verified. Please login to continue.');
                return redirect()->route('shop.login');
            }

        }

        $request->session()->flash('error-message', 'Invalid Request.');
        return redirect()->route('shop.login');

    }

}
