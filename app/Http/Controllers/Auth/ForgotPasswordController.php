<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordForgetMail;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ForgotPasswordController extends Controller
{


    public function passwordForget(){
        return view('auth.forget');
    }

    public function passwordForgetSubmit(Request $request){
        $email = $request->email;

        $request->validate([
            'email' => "required|exists:users,email"
        ]);

        $user = User::where('email', $email)->first();
        $id = $user->id;

        Mail::to($email)->send(new PasswordForgetMail($email, $id));
        return back()->with('success', 'Check your email for reset link');
    }

    public function passwordReset($email, $id){
        return view('auth.reset', [
            'email' => $email,
            'id' => $id,
        ]);
    }

    public function passwordResetSubmit(Request $request){
        $request->validate([
            'id' => "required|exists:users,id",
            'email' => "required|exists:users,email",
            'password' => 'required|min:6',
        ]);

        $user = User::find($request->id);

        if($user->email == $request->email){
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success', 'Password Change Seccessful. Please login again');
        }

        return back()->with('error', 'You have someting error. try again');
    }
}
