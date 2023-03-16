<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Question;
use App\Models\StudentInformation;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('comments',)->where("is_active", 1)->take(3)->get();
        $counters = Counter::where("is_active", 1)->take(4)->get();
        $notices = Notice::where("is_active", 1)->take(4)->get();
        $galleries = Gallery::where("is_active", 1)->take(8)->get();
        $whychooses = WhyChoose::where("is_active", 1)->take(4)->get();
        $questions = Question::where("is_active", 1)->take(4)->get();
        $testimonials = Testimonial::where("is_active", 1)->get();
        $teams = Team::where("is_active", 1)->get();
        $courses = Course::where("is_active", 1)->get();

        return view('frontend.index',[
            "blogs" => $blogs,
            "counters" => $counters,
            "galleries" => $galleries,
            "notices" => $notices,
            "whychooses" => $whychooses,
            "questions" => $questions,
            "testimonials" => $testimonials,
            "teams" => $teams,
            "courses" => $courses,
        ]);
    }


}
