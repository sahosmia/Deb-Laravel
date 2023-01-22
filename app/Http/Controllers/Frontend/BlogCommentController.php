<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;


class BlogCommentController extends Controller
{

    public function store(Request $request){

        $input = $request->all();
        $request->validate([
            'body'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        // return $input;
        BlogComment::create($input);

        return back();
    }
}
