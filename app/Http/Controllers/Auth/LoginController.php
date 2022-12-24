<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginSubmitRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class LoginController extends Controller
{


    // Login View
    public function login(){
        return view('auth.login');
    }

    // Login Submit
    public function loginSubmit(LoginSubmitRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(auth()->user()->role_id == 1){
                return redirect()->route('frontend.index');
            }
           return redirect()->route('admin.home')->withSuccess('Signed in');
        }
        return back()->with('error', "Your email or password is wrong.");
    }



    // Logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', "Your are success to logout");
    }



    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



    // important
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
