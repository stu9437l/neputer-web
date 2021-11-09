<?php


namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\AUTH_ANY;

class LoginController
{
    use Authenticatable;

    /**
     * @var User
     */
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $id = Auth::user()->getAuthIdentifier();
            $users = User::find($id);
            $role_status = $users->roles()->where('status',1)->first();

            if ($users->status === 0 || $role_status === null) {
                Auth::logout();
                session()->flash('error-message', "Your Role is not Activated");
                return redirect()->route('login');
            }
            elseif($role_status->role === 'Super Admin') {
                return redirect('admin/dashboard');
            }
            else{
                Auth::logout();
                return redirect('/admin/dashboard');
            }
        }
        else{
            session()->flash('error-message',"Record Doesn't matched");
            Auth::logout();
            return redirect('/login');
        }

    }
}