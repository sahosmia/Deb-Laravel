<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;


class FrontendProfileController extends Controller
{

    public function index()
    {
        $data = User::find(55);

// return $data->information;
        return view('frontend.profile.index',[
            // "blogs" => $blogs,

        ]);
    }

    // public function details($slug){
    //         $data = Blog::with('comments.replies')->where("slug", $slug)->first();
    //         $latest_blogs = Blog::where("is_active", 1)->take(3)->latest()->get();
    //         return view("frontend.blog.details", [
    //             "data" => $data,
    //             "latest_blogs" => $latest_blogs,
    //         ]);
    // }





}
