<?php

namespace App\Http\Controllers\Auth;

use App\Facades\AppHelperFacade;
use App\Http\Controllers\Controller;
use App\MyLibraries\HelperClass\AppHelper;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';
    protected $redirect_route = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')
            ->except('logout'
            );
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {

        $this->validate($request, [
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ]);
    }


    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $is_customer = AppHelperFacade::isCustomerLogin();
        $this->guard()->logout();

//        $request->session()->invalidate();

        if ($request->has('source') && $request->get('source') == 'shop') {
            return redirect()->route('shop.login');
        } else {
            return redirect()->route($is_customer ? 'shop.login' : $this->redirect_route);
        }

    }

    public function showShopLoginForm()
    {
        return view('shop.auth.login');
    }

    public function showShopResetForm()
    {

        return view('shop.auth.reset');

    }

    public function showShopRegisterForm()
    {
        return view('shop.auth.register');
    }

    public function showShopResetPasswordForm()
    {
        return view('shop.auth.reset_password');
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {

        $roles = $user->roles()->pluck('role', 'slug')->toArray();

        if ($request->has('back')) {
            return redirect()->to($request->get('back'));
        } elseif (array_key_exists('customer', $roles)) {
            return redirect()->route('cart');
        } else {

            return redirect()->intended($this->redirectPath());
        }

    }

}
