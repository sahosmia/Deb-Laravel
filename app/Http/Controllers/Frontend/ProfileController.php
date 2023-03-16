<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Profile\ProfileGenarelUpdateRequest;
use App\Http\Requests\Frontend\Profile\ProfileOtherUpdateRequest;
use App\Http\Requests\Frontend\Profile\ProfilePasswordUpdateRequest;
use App\Models\Course;
use App\Models\CourseChapter;
use App\Models\CourseLesson;
use App\Models\CoursePurchases;
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
    public function dashboard()
    {
        $course_id = CoursePurchases::where('user_id', auth()->id())->pluck('course_id');
        $courses = Course::whereIn('id', $course_id)->get();

        return view('frontend.profile.dashboard', [
            'courses' => $courses,
        ]);
    }

    public function dashboardCourse($course_slug, $lesson_id = null)
    {
        $data = Course::where('slug', $course_slug)->first();
        $checkEnroll = CoursePurchases::where('user_id', auth()->id())
            ->where('course_id', $data->id)
            ->count();

        if ($checkEnroll != 0) {
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

            return view('frontend.profile.dashboard-course', [
                'data' => $data,
                'lesson_data' => $lesson_data,
            ]);
        }
        else{
            return view('errors.404');
        }
    }

    public function edit()
    {
        return view('frontend.profile.edit');
    }

    public function updateGenarel(ProfileGenarelUpdateRequest $request)
    {
        $inputs = $request->only('name', 'email');

        if ($request->hasFile('image')) {
            $currentImage = User::find(auth()->id())->image;
            if ($currentImage != null && file_exists(public_path() . '/upload/user/' . $currentImage)) {
                unlink(public_path('upload/user/' . $currentImage));
            }

            $image = Image::make($request->file('image'));
            $imageName = 'user-' . auth()->id() . '.' . $request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/user/');
            $image->resize(150, 150);
            $image->save($destinationPath . $imageName);

            $inputs['image'] = $imageName;
        }

        try {
            User::find(auth()->id())->update($inputs);
            Session::flash('success', 'Record update successfully!');
            return back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function updateOther(ProfileOtherUpdateRequest $request)
    {
        $user = UserInformation::where('user_id', auth()->id())->first();

        $inputs = $request->only('gender', 'blood', 'profession', 'date_of_birth', 'facebook', 'linkedin', 'address', 'phone', 'whatsapp', 'drive');

        try {
            $user->update($inputs);
            Session::flash('success', 'Record update successfully');
            return back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }

    public function updatePassword(ProfilePasswordUpdateRequest $request)
    {
        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('error', "Old Password Doesn't match!");
        }

        try {
            User::find(auth()->id())->update([
                'password' => Hash::make($request->password),
            ]);
            Session::flash('success', 'Password changed successfully!');
            return back();
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return redirect()->back();
        }
    }
}
