<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Counter\CounterStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Counter\CounterUpdateRequest;
use App\Models\Counter;
use Illuminate\Support\Facades\Session;
use Image;

class CounterController extends Controller
{

    public function index()
    {

        return view('admin.genaral-content.counters.index', [
            'counters' => Counter::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.genaral-content.counters.create');
    }


    public function store(CounterStoreRequest $request){

        $inputs = $request->only("title", "number", "is_active");
        $inputs['added_by'] = auth()->id();


        try{
            // return $inputs;
            Counter::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.counters.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    // public function show($id)
    // {
    //     $data = Counter::find($id);

    //     return view('admin.genaral-content.counters.details', [
    //         'data' => $data,
    //     ]);
    // }


    public function edit($id)
    {
        $data = Counter::find($id);

        return view('admin.genaral-content.counters.edit', [
            'data' => $data,
        ]);
    }


    public function update(CounterUpdateRequest $request, $id){

        $inputs = $request->only("title", "number", "is_active");
        $inputs['added_by'] = auth()->id();


        try{
            Counter::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.counters.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = Counter::find($id);

        $data->delete();

        return redirect()->route('admin.counters.index')->with('success', 'Record delete successfully');
    }


}
