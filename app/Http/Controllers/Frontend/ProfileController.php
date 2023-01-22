<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Profile\ProfileGenarelUpdateRequest;
use App\Http\Requests\Frontend\Profile\ProfileOtherUpdateRequest;
use App\Http\Requests\Frontend\Profile\ProfilePasswordUpdateRequest;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;

class ProfileController extends Controller
{

    public function index()
    {
            return view('frontend.profile.index');
    }

    public function edit()
    {
            return view('frontend.profile.edit');
    }

    public function updateGenarel(ProfileGenarelUpdateRequest $request)
    {
        $inputs = $request->only("name", "email");



        if($request->hasFile("image")){
            $currentImage = User::find(auth()->id())->image;
            if($currentImage != null){
                unlink(public_path('upload/user/'.$currentImage));
            }

            $image = Image::make($request->file('image'));
            $imageName = 'user-'.auth()->id().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/user/');
            $image->resize(150,150);
            $image->save($destinationPath.$imageName);

            $inputs['image'] = $imageName;
        }


        try{
            User::find(auth()->id())->update($inputs);
            Session::flash('success',"Record update successfully!");
            return back();
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }

    }

    public function updateOther(ProfileOtherUpdateRequest $request)
    {
        $user = UserInformation::where('user_id', auth()->id())->first();

        $inputs = $request->only("gender", "blood", "profession", "date_of_birth", "facebook","linkedin", "address", "phone", "whatsapp", "drive");

        try{
           $user->update($inputs);
            Session::flash('success',"Record update successfully");
            return back();
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }

    }

    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {

        if(!Hash::check($request->current_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        try{
            User::find(auth()->id())->update([
                'password' => Hash::make($request->password)
            ]);
            Session::flash('success',"Password changed successfully!");
            return back();
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }

    }


}
