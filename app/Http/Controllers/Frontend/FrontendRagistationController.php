<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Question;
use App\Models\Ragistation;
use App\Models\StudentInformation;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use Illuminate\Http\Request;


class FrontendRagistationController extends Controller
{

    public function index()
    {
        $batches = Batch::all();
        $is_ragistation = Ragistation::where('user_id', auth()->id())->count();

        return view('frontend.ragistation.index',[
            'batches' => $batches,
            'is_ragistation' => $is_ragistation,
        ]);
    }



    public function ragistationSubmit(Request $request){

        $request->validate([
            'phone' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required|url',
            'linkedin' => 'required|url',
            'batch_id' => 'required',
            'date_of_birth' => 'required',
        ]);

        Ragistation::create([
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'drive' => $request->drive,
            'batch_id' => $request->batch_id,
            'user_id' => auth()->id(),
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return back()->withSuccess('Registation Successfully');
    }











}
