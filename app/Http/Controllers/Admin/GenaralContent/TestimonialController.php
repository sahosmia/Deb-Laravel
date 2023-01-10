<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Testimonial\TestimonialStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Testimonial\TestimonialUpdateRequest;
use App\Models\Batch;
use App\Models\StudentInformation;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Image;

class TestimonialController extends Controller
{

    public function index()
    {
        return view('admin.genaral-content.testimonials.index', [
            'testimonials' => Testimonial::latest()->paginate(10),
        ]);
    }






    public function create()
    {
        return view('admin.genaral-content.testimonials.create');
    }


    public function store(TestimonialStoreRequest $request){

        $inputs = $request->only("name", "designation", "company", "feedback", "is_active");
        $inputs['added_by'] = auth()->id();

        if($request->hasFile("image")){
            $image = Image::make($request->file('image'));
            $imageName = 'testimonial-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/testimonial/');
            $image->resize(100,100);
            $image->save($destinationPath.$imageName);
            // return $imageName;

            $inputs['image'] = $imageName;
        }

        try{
            // return $inputs;
            Testimonial::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.testimonials.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $data = Testimonial::find($id);

        return view('admin.genaral-content.testimonials.details', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
        $data = Testimonial::find($id);

        return view('admin.genaral-content.testimonials.edit', [
            'data' => $data,
        ]);
    }


    public function update(TestimonialUpdateRequest $request, $id){

        $inputs = $request->only("name", "designation", "company", "feedback", "is_active");
        $inputs['added_by'] = auth()->id();

        if($request->hasFile("image")){
            $currentImage = Testimonial::find($id)->image;
            unlink(public_path('upload/testimonial/'.$currentImage));

            $image = Image::make($request->file('image'));
            $imageName = 'testimonial-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/testimonial/');
            $image->resize(100,100);
            $image->save($destinationPath.$imageName);

            $inputs['image'] = $imageName;
        }

        try{
            Testimonial::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.testimonials.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = Testimonial::find($id);
        unlink(public_path('upload/testimonial/'.$data->image));
        $data->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Record delete successfully');
    }


}
