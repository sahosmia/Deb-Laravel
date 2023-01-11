<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Gallery\GalleryStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Gallery\GalleryUpdateRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Session;
use Image;

class GalleryController extends Controller
{

    public function index()
    {
        return view('admin.genaral-content.galleries.index', [
            'galleries' => Gallery::latest()->paginate(10),
        ]);
    }






    public function create()
    {
        return view('admin.genaral-content.galleries.create');
    }


    public function store(GalleryStoreRequest $request){

        $inputs = $request->only("title", "is_active");
        $inputs['added_by'] = auth()->id();

        if($request->hasFile("image")){
            $image = Image::make($request->file('image'));
            $imageName = 'gallery-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/gallery/');
            $image->resize(600,400);
            $image->save($destinationPath.$imageName);

            $inputs['image'] = $imageName;
        }

        try{
            Gallery::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.galleries.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $data = Gallery::find($id);

        return view('admin.genaral-content.galleries.details', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
        $data = Gallery::find($id);

        return view('admin.genaral-content.galleries.edit', [
            'data' => $data,
        ]);
    }


    public function update(GalleryUpdateRequest $request, $id){

        $inputs = $request->only("title", "is_active");
        $inputs['added_by'] = auth()->id();

        if($request->hasFile("image")){
            $currentImage = Gallery::find($id)->image;
            unlink(public_path('upload/gallery/'.$currentImage));

            $image = Image::make($request->file('image'));
            $imageName = 'gallery-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/gallery/');
            $image->resize(600,400);
            $image->save($destinationPath.$imageName);

            $inputs['image'] = $imageName;
        }

        try{
            Gallery::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.galleries.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = Gallery::find($id);
        unlink(public_path('upload/gallery/'.$data->image));
        $data->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Record delete successfully');
    }
}
