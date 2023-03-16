<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notice;

class NoticeController extends Controller{
    public function index()
    {
        $notices = Notice::where("is_active", 1)->get();

        return view('frontend.notice.index',[
            "notices" => $notices,
        ]);
    }
}
