<?php

namespace App\Http\Middleware;

use Closure;
//use App\Http\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Report
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        print_r($request->all());die;
//        if ($this->auth->hasRole($role)) {
//
//        }
//        return $next($request);

//        var_dump($this->auth->guest());
//        die;

        if ($request->user()->report_login_active != 1) {
//            die('dvxcdvxcdvxcv ');
//            if ($this->auth->check()) {
//                return redirect('/admin/dashboard');
//            }
//        } else {
            Auth::logout();
            return redirect()->guest('/login');
        }
//        if ($this->auth->user()) {
//            if ($request->ajax()) {
//                return response('Unauthorized.', 401);
//            } else {
//                return redirect()->guest('/admin/login');
//            }
//        }
//        if ($this->auth->check()) {
//            return redirect('view');
//        }

        return $next($request);
    }


}
