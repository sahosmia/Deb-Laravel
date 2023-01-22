<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Blog\BlogStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Blog\BlogUpdateRequest;
use App\Http\Requests\Admin\GenaralContent\Setting\ContactSettingUpdateRequest;
use App\Models\Blog;
use App\Models\GenarelSetting;
use Illuminate\Support\Facades\Session;
use Image;

class SettingController extends Controller
{

    public function index()
    {
        return view('admin.genaral-content.settings.index');
    }



    public function contactUpdate(ContactSettingUpdateRequest $request)
    {

        $inputs = $request->only("phone", "whatsapp", "facebook", "facebook_group", "linkedin", "youtube");
        try{
            GenarelSetting::find(1)->update($inputs);
            Session::flash('success',"Record create successfully!");
            return redirect()->route('admin.settings.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function store(BlogStoreRequest $request){

        $inputs = $request->only("title", "short_description", "description", "is_active");
        $inputs['added_by'] = auth()->id();
        $inputs['slug'] = strtolower(str_replace(" ","-",$request->title)).'-'.time();


        if($request->hasFile("image")){
            $image = Image::make($request->file('image'));
            $imageName = 'blog-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/blog/');
            $image->resize(600,400);
            $image->save($destinationPath.$imageName);
            $inputs['image'] = $imageName;
        }

        try{
            Blog::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.blogs.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function show($slug)
    {
        $data = Blog::where('slug', $slug)->first();

        return view('admin.genaral-content.blogs.details', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
        $data = Blog::find($id);

        return view('admin.genaral-content.blogs.edit', [
            'data' => $data,
        ]);
    }


    public function update(BlogUpdateRequest $request, $id){

        $inputs = $request->only("title", "short_description", "description", "is_active");
        $inputs['added_by'] = auth()->id();
        $inputs['slug'] = strtolower(str_replace(" ","-",$request->title)).'-'.time();

        if($request->hasFile("image")){
            $currentImage = Blog::find($id)->image;
            unlink(public_path('upload/blog/'.$currentImage));

            $image = Image::make($request->file('image'));
            $imageName = 'blog-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/blog/');
            $image->resize(600,400);
            $image->save($destinationPath.$imageName);

            $inputs['image'] = $imageName;
        }

        try{
            Blog::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.blogs.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = Blog::find($id);
        unlink(public_path('upload/blog/'.$data->image));
        $data->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Record delete successfully');
    }


}
