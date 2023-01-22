<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::where("is_active", 1)->get();


        return view('frontend.blog.index',[
            "blogs" => $blogs,
        ]);
    }

  



    public function details($slug){
            $data = Blog::with('comments')->where("slug", $slug)->first();
            $latest_blogs = Blog::where("is_active", 1)->whereNot('slug', $slug)->take(3)->latest()->get();
            return view("frontend.blog.details", [
                "data" => $data,
                "latest_blogs" => $latest_blogs,
            ]);
    }





}
