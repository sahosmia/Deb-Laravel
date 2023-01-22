<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Ragistation;
use Illuminate\Http\Request;


class RagistationController extends Controller
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
