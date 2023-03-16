<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginSubmitRequest;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // Login View
    public function login()
    {
        return view('auth.login');
    }

    // Login Submit
    public function loginSubmit(LoginSubmitRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            if (checkPermission('display-dashboard') == true) {
                return redirect()->route('front.index');
            }

            return redirect()->route('admin.home');
        }
        return back()->with('error', 'Your email or password is wrong.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // important
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
