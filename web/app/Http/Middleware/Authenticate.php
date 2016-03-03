<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth as AuthUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Authenticate
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
    public function handle($request, Closure $next, $parentmodule)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/login');
            }
        }
        $userRoleFlag = false;
//        if (AuthUser::check()) {
//            die("checked");
//        } else {
//            die("checked else");
//        }die;

        if (AuthUser::check()) {
//            $userRole = $request->user()->role;
            if ($parentmodule == "admin") {
                if (Session::has('ror_admin')) {    // || Session::has('fs_manager')) { // $userRole = 5,4
                    $userRoleFlag = true;
                }
                if (!$userRoleFlag) {
                    return redirect('/admin/login');
                }
            }
//            else if ($parentmodule == "user") {
//                if (Session::has('ror_buyer') || Session::has('ror_customer') || Session::has('ror_admin')) { //ALSO USE " || Session::has('fs_supplier')" in if condition if SUPPLIER CAN ACT AS A BUYER/CUSTOMER  //$userRole = 1,2
//                    $userRoleFlag = true;
//                }
//                if (!$userRoleFlag) {
//                    return redirect('/');
//                }
//            }
            else if ($parentmodule == "user") {
                if (Session::has('ror_user') || Session::has('ror_admin')) { //ALSO USE " || Session::has('fs_supplier')" in if condition if SUPPLIER CAN ACT AS A BUYER/CUSTOMER  //$userRole = 1,2
                    $userRoleFlag = true;
                }
                if (!$userRoleFlag) {
                    return redirect('/');
                }
            } else if ($parentmodule == "report") {
//                die("report");
                if (Session::has('ror_report') || Session::has('ror_user')) { //ALSO USE " || Session::has('fs_supplier')" in if condition if SUPPLIER CAN ACT AS A BUYER/CUSTOMER  //$userRole = 1,2
                    $userRoleFlag = true;
//                    return redirect('/filereport');
                }
                if (!$userRoleFlag) {
                    return redirect('/');
                }
            } else if ($parentmodule == "business") {
                if (Session::has('ror_business') || Session::has('ror_business')) { //ALSO USE " || Session::has('fs_supplier')" in if condition if SUPPLIER CAN ACT AS A BUYER/CUSTOMER  //$userRole = 1,2
                    $userRoleFlag = true;
                }
                if (!$userRoleFlag) {
                    return redirect('/');
                }
            }
        }
        return $next($request);
    }


}
