<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseManagement\Chapter\ChapterStoreRequest;
use App\Http\Requests\Admin\CourseManagement\Chapter\ChapterUpdateRequest;
use App\Models\Course;
use App\Models\CourseChapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChapterController extends Controller
{

    // public function index()
    // {
    //     return view('admin.course-management.courses.index', [
    //         'courses' => Course::latest()->paginate(50),
    //     ]);
    // }



    public function create($course_id)
    {
        return view('admin.course-management.chapters.create',[
            'course_id' => $course_id,
        ]);

    }


    public function store(ChapterStoreRequest $request){

        $inputs = $request->only("title", "position", "course_id",);

        try{
            CourseChapter::create($inputs);
            Session::flash('success',"Record create successfully");
            return back();
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }



    public function edit($id)
    {
        $data = CourseChapter::find($id);
        return view('admin.course-management.chapters.edit', [
            'data' => $data,
        ]);
    }





    public function update(ChapterUpdateRequest $request, $id){

         $inputs = $request->only("title", "position");

        try{
            CourseChapter::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return back();
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = CourseChapter::find($id);
        $data->delete();

        return back()->with('success', 'Record delete successfully');
    }

}
