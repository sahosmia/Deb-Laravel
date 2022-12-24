<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{



    public function index()
    {
        return view('admin.home');
    }










    // Remove all code

    public function createPermission(Request $request){

        Permission::create(['name' => $request->permission]);

        return back()->with('success', 'Permission create done');

    }

    public function createRole(Request $request){

        Role::create(['name' => $request->role]);

        return back()->with('success', 'Role create done');

    }


    public function signin_page()
    {
        if(Auth::check()){
            return back();
        }
        return view('login-page');
    }

    public function signin_page_submit(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);

        if (Auth::attempt($credentials)) {
            // return redirect()->intended('home')
            //             ->withSuccess('Signed in');

            if(auth()->user()->role_id == 1){
                return redirect()->route('web');
            }

           return redirect()->intended('home')
                        ->withSuccess('Signed in');

        }
    }


}
