<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Blog;
use App\Models\Counter;
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

// return $blogs;
        return view('frontend.index',[
            "blogs" => $blogs,
            "counters" => $counters,
            "galleries" => $galleries,
            "notices" => $notices,
            "whychooses" => $whychooses,
            "questions" => $questions,
            "testimonials" => $testimonials,
            "teams" => $teams,
        ]);
    }


    public function ragistation(){

        $batches = Batch::all();
        $is_ragistation = StudentInformation::where('user_id', auth()->id())->count();

        return view('frontend.ragistation',[
            'batches' => $batches,
            'is_ragistation' => $is_ragistation,
        ]);
    }

    public function ragistationSubmit(Request $request){

        $request->validate([
            'phone' => 'required',
            'whatsup' => 'required',
            'facebook_link' => 'required',
            'linkedin_link' => 'required',
            'batch_id' => 'required',
        ]);

        StudentInformation::create([
            'phone' => $request->phone,
            'whatsup' => $request->whatsup,
            'facebook_link' => $request->facebook_link,
            'linkedin_link' => $request->linkedin_link,
            'batch_id' => $request->batch_id,
            'user_id' => auth()->id(),
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return back()->withSuccess('Registation Successfully');
    }











}
