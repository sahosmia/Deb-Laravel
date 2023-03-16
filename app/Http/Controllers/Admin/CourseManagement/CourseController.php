<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseManagement\Course\CourseStoreRequest;
use App\Http\Requests\Admin\CourseManagement\Course\CourseUpdateRequest;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseLesson;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Image;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.course-management.courses.index', [
            'courses' => Course::latest()->paginate(50),
        ]);
    }

    public function create()
    {
        $userRole = Role::where('name', 'User')->first();

        $instructors = User::whereNot('role_id', $userRole->id)->get();
        return view('admin.course-management.courses.create', [
            'instructors' => $instructors,
        ]);
    }

    public function store(CourseStoreRequest $request)
    {
        $inputs = $request->only('title', 'price', 'description', 'will_learn', 'requirement', 'skill_level', 'instructor_id', 'is_active');

        $inputs['slug'] = $request->slug != null ? strtolower(str_replace(' ', '-', $request->slug)) . '-' . time() : strtolower(str_replace(' ', '-', $request->title)) . '-' . time();

        if ($request->hasFile('image')) {
            $image = Image::make($request->file('image'));
            $imageName = 'course-thumbnail-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/course/thumbnail/');
            $image->resize(600, 400);
            $image->save($destinationPath . $imageName);
            $inputs['image'] = $imageName;
        }

        try {
            Course::create($inputs);
            Session::flash('success', 'Record create successfully');
            return redirect()->route('admin.courses.index');
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function show($slug, $lesson_id = null)
    {
        $data = Course::where('slug', $slug)->first();

        $chapter = CourseChapter::where('course_id', $data->id)
            ->orderBy('position')
            ->first();

        $lesson_data = isset($chapter)
            ? CourseLesson::where('course_chapter_id', $chapter->id)
                ->orderBy('position')
                ->first()
            : null;

        if ($lesson_id != null) {
            $lesson_data = CourseLesson::find($lesson_id);
        }

        return view('admin.course-management.courses.details', [
            'data' => $data,
            'lesson_data' => $lesson_data,
        ]);
    }

    public function edit($id)
    {
        $userRole = Role::where('name', 'User')->first();

        $instructors = User::whereNot('role_id', $userRole->id)->get();
        $data = Course::find($id);

        return view('admin.course-management.courses.edit', [
            'data' => $data,
            'instructors' => $instructors,
        ]);
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        $data = Course::find($id);
        $inputs = $request->only('title', 'price', 'description', 'will_learn', 'requirement', 'skill_level', 'instructor_id', 'is_active');

        $inputs['slug'] = $request->slug != null ? strtolower(str_replace(' ', '-', $request->slug)) . '-' . time() : $data->slug;

        if ($request->hasFile('image')) {
            $currentImage = Course::find($id)->image;
            unlink(public_path('upload/course/thumbnail/' . $currentImage));

            $image = Image::make($request->file('image'));
            $imageName = 'course-thumbnail-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/course/thumbnail/');
            $image->resize(600, 400);
            $image->save($destinationPath . $imageName);

            $inputs['image'] = $imageName;
        }

        try {
            Course::find($id)->update($inputs);
            Session::flash('success', 'Record update successfully');
            return redirect()->route('admin.courses.index');
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = Course::find($id);

        unlink(public_path('upload/course/thumbnail/'.$data->image));

        $data->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Record delete successfully');
    }
}
