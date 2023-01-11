<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Notice\NoticeStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Notice\NoticeUpdateRequest;
use App\Models\Notice;
use Illuminate\Support\Facades\Session;

class NoticeController extends Controller
{

    public function index()
    {
        return view('admin.genaral-content.notices.index', [
            'notices' => Notice::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.genaral-content.notices.create');
    }


    public function store(NoticeStoreRequest $request){

        $inputs = $request->only("title", "description", "is_active");
        $inputs['added_by'] = auth()->id();


        try{
            Notice::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.notices.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    // public function show($id)
    // {
    //     $data = Notice::find($id);

    //     return view('admin.genaral-content.notices.details', [
    //         'data' => $data,
    //     ]);
    // }


    public function edit($id)
    {
        $data = Notice::find($id);

        return view('admin.genaral-content.notices.edit', [
            'data' => $data,
        ]);
    }


    public function update(NoticeUpdateRequest $request, $id){

        $inputs = $request->only("title", "description", "is_active");
        $inputs['added_by'] = auth()->id();



        try{
            Notice::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.notices.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = Notice::find($id);
        $data->delete();

        return redirect()->route('admin.notices.index')->with('success', 'Record delete successfully');
    }


}
