<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;

class GalleryController extends Controller{

    public function index()
    {
        $galleries = Gallery::where("is_active", 1)->get();

        return view('frontend.gallery.index',[
            "galleries" => $galleries,
        ]);
    }

}
