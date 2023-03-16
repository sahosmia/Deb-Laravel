<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\MessageStoreRequest;
use App\Models\Message;


class ContactController extends Controller
{

    public function index(){
        return view('frontend.contact.index');
    }

    public function messageStore(MessageStoreRequest $request){

        $inputs = $request->only("name", "email", "message");
        Message::create($inputs);

        return back()->with('success', 'Your message send successfully!');
    }





}
