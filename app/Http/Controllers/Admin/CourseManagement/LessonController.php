<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseManagement\Lesson\LessonStoreRequest;
use App\Http\Requests\Admin\CourseManagement\Lesson\LessonUpdateRequest;
use App\Models\CourseLesson;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    public function create($course_chapter_id)
    {
        return view('admin.course-management.lessons.create', [
            'course_chapter_id' => $course_chapter_id,
        ]);
    }

    public function store(LessonStoreRequest $request)
    {
        $inputs = $request->only('title', 'position', 'file_type', 'file_name', 'course_chapter_id');

        try {
            CourseLesson::create($inputs);
            Session::flash('success', 'Record create successfully');
            return back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = CourseLesson::find($id);
        return view('admin.course-management.lessons.edit', [
            'data' => $data,
        ]);
    }

    public function update(LessonUpdateRequest $request, $id)
    {
        $inputs = $request->only('title', 'position', 'file_type', 'file_name');



        try {
            CourseLesson::find($id)->update($inputs);
            Session::flash('success', 'Record update successfully');
            return back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($course_slug, $id)
    {
        $data = CourseLesson::find($id);

        $data->delete();

        return redirect()->route('admin.courses.show', $course_slug)->with('success', 'Record delete successfully');
    }
}
