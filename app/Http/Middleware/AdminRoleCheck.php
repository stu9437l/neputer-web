<?php

namespace App\Http\Middleware;

use Closure;

class AdminRoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            //check if logged in user is customer
            $user = auth()->user();
            $roles = $user->roles->pluck('role', 'slug')->toArray();

            if (array_key_exists('super-admin', $roles) || array_key_exists('admin', $roles)) {

                return $next($request);

            } elseif (array_key_exists('customer', $roles)) {

                //if logged in and is also a customer redirect to customer panel/dashboard
                return redirect()->route('shop.customer.dashboard');

            } else {

                //send exception email
                return redirect()->route('shop.register');
            }

        } else {
            return redirect()->route('login');
        }

    }
}
