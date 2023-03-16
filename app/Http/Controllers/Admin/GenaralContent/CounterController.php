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

        if (checkPermission('display-counter') == true) {
            return redirect()->route('noAccess');
        }

        return view('admin.genaral-content.counters.index', [
            'counters' => Counter::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        if (checkPermission('create-counter') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.genaral-content.counters.create');
    }


    public function store(CounterStoreRequest $request){

        if (checkPermission('create-counter') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("title", "number", "is_active");
        $inputs['added_by'] = auth()->id();


        try{
            Counter::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.counters.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        if (checkPermission('edit-counter') == true) {
            return redirect()->route('noAccess');
        }
        $data = Counter::find($id);

        return view('admin.genaral-content.counters.edit', [
            'data' => $data,
        ]);
    }


    public function update(CounterUpdateRequest $request, $id){

        if (checkPermission('edit-counter') == true) {
            return redirect()->route('noAccess');
        }
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

        if (checkPermission('delete-counter') == true) {
            return redirect()->route('noAccess');
        }
        $data = Counter::find($id);

        $data->delete();

        return redirect()->route('admin.counters.index')->with('success', 'Record delete successfully');
    }


}
