<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\RegisterOtpSubmitRequest;
use App\Http\Requests\Admin\Auth\RegisterSubmitRequest;
use App\Mail\RegisterOtpMail;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserInformation;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(RegisterSubmitRequest $request)
    {
        $otp = rand(1000, 9999);

        if ($request->session()->has('register_data')) {
            Session::forget('register_data');
        }

        Session::put('register_data', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'otp' => $otp,
            'time' => Carbon::now(),
        ]);

        Mail::to($request->email)->send(new RegisterOtpMail($otp));
        return redirect()
            ->route('registerOtp')
            ->with('success', 'Check your email for otp. It duration is 5 minit');

        // User Data Store
                // $user = User::create([
                //     'name' => $request->name,
                //     'email' => $request->email,
                //     'password' => Hash::make($request->password),
                //     'role_id' => 1,
                // ]);


                // UserInformation::create([
                //     'user_id' => $user->id,
                // ]);

                // $user->assignRole(1);

                // $credentials = [
                //     'email' => $request->email,
                //     'password' => $request->password,
                // ];

                // if (Auth::attempt($credentials)) {
                //     return redirect()->route('front.index');
                // }
                // return back()->with('error', 'Something is error.');
    }

    public function registerOtp()
    {
        return view('auth.register-otp');
    }

    public function registerOtpSubmit(RegisterOtpSubmitRequest $request)
    {
        $user_data = Session::get('register_data');
        $time_diff = $user_data['time']->diffInMinutes();

        if ($time_diff < 5) {
            if ($request->otp == $user_data['otp']) {
                // User Data Store
                $user = User::create([
                    'name' => $user_data['name'],
                    'email' => $user_data['email'],
                    'password' => Hash::make($user_data['password']),
                    'role_id' => 1,
                ]);


                UserInformation::create([
                    'user_id' => $user->id,
                ]);

                $user->assignRole(1);

                $credentials = [
                    'email' => $user_data['email'],
                    'password' => $user_data['password'],
                ];

                if (Auth::attempt($credentials)) {
                    return redirect()->route('front.index');
                }
                return back()->with('error', 'Something is error.');
            }
            return back()->with('error', 'Your otp code is wrong. Plese check again');
        }
        return back()->with('error', 'This Otp time is end. Plese resend otp again');
    }




    public function resendOtp(){

        $otp = rand(1000, 9999);

        Session::put('register_data.otp', $otp);
        Session::put('register_data.time', Carbon::now());



        Mail::to(Session::get('register_data.email'))->send(new RegisterOtpMail($otp));
        return redirect()
            ->route('registerOtp')
            ->with('success', 'Otp Send Again. Check your email for otp. It duration is 5 minit');
    }

    // use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
}
