<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseReview;
use Illuminate\Http\Request;

class CourseController extends Controller{
    public function index()
    {
        $courses = Course::where("is_active", 1)->get();

        return view('frontend.course.index',[
            "courses" => $courses,
        ]);
    }




    public function details($slug){
            $data = Course::where("slug", $slug)->first();
            $reviews = $data->courseReviews;
            $sum = array_sum($reviews->pluck('rating')->toArray());
            $avarage = 0;
            if ($reviews->count() != 0) {
                $avarage = $sum / $reviews->count();
            }
            $latest_blogs = Course::where("is_active", 1)->whereNot('slug', $slug)->take(3)->latest()->get();
            return view("frontend.course.details", [
                "data" => $data,
                "avarage" => $avarage,
                "latest_blogs" => $latest_blogs,
            ]);


    }


    public function reviewStore(Request $request){
        $inputs = $request->only("rating", "comment", "course_id");
        $inputs['user_id'] = auth()->id();

            CourseReview::create($inputs);
            return back();

    }





}
