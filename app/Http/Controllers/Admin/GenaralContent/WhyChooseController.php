<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\WhyChoose\WhyChooseStoreRequest;
use App\Http\Requests\Admin\GenaralContent\WhyChoose\WhyChooseUpdateRequest;
use App\Models\WhyChoose;
use Illuminate\Support\Facades\Session;


class WhyChooseController extends Controller
{

    public function index()
    {
        if (checkPermission('display-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.genaral-content.why-chooses.index', [
            'why_chooses' => WhyChoose::latest()->paginate(10),
        ]);
    }


    public function create()
    {
         if (checkPermission('display-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.genaral-content.why-chooses.create');
    }


    public function store(WhyChooseStoreRequest $request){

         if (checkPermission('create-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("title", "description", "icon", "is_active");
        $inputs['added_by'] = auth()->id();

        try{
            WhyChoose::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.why-chooses.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
         if (checkPermission('create-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        $data = WhyChoose::find($id);

        return view('admin.genaral-content.why-chooses.details', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
         if (checkPermission('edit-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        $data = WhyChoose::find($id);

        return view('admin.genaral-content.why-chooses.edit', [
            'data' => $data,
        ]);
    }


    public function update(WhyChooseUpdateRequest $request, $id){

         if (checkPermission('edit-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("title", "description", "icon", "is_active");
        $inputs['added_by'] = auth()->id();

        try{
            WhyChoose::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.why-chooses.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

         if (checkPermission('delete-why-choose') == true) {
            return redirect()->route('noAccess');
        }
        $data = WhyChoose::find($id);
        $data->delete();

        return redirect()->route('admin.why-chooses.index')->with('success', 'Record delete successfully');
    }


}
