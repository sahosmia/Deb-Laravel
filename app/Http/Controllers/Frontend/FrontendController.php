<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\StudentInformation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class FrontendController extends Controller
{

    public function index()
    {
        return view('frontend.index');
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
