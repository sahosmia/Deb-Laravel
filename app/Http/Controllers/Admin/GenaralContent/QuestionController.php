<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Question\QuestionStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Question\QuestionUpdateRequest;
use App\Models\Question;
use Illuminate\Support\Facades\Session;
use Image;

class QuestionController extends Controller
{

    public function index()
    {
        if (checkPermission('display-question') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.genaral-content.questions.index', [
            'questions' => Question::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        if (checkPermission('create-question') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.genaral-content.questions.create');
    }


    public function store(QuestionStoreRequest $request){

        if (checkPermission('create-question') == true) {
            return redirect()->route('noAccess');
        }
        $inputs = $request->only("title", "answer", "is_active");
        $inputs['added_by'] = auth()->id();



        try{
            Question::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.questions.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        if (checkPermission('display-question') == true) {
            return redirect()->route('noAccess');
        }
        $data = Question::find($id);

        return view('admin.genaral-content.questions.details', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
         if (checkPermission('edit-question') == true) {
            return redirect()->route('noAccess');
        }
        $data = Question::find($id);

        return view('admin.genaral-content.questions.edit', [
            'data' => $data,
        ]);
    }


    public function update(QuestionUpdateRequest $request, $id){

        if (checkPermission('edit-question') == true) {
            return redirect()->route('noAccess');
        }

        $inputs = $request->only("title", "answer", "is_active");
        $inputs['added_by'] = auth()->id();

        try{
            Question::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.questions.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        if (checkPermission('delete-question') == true) {
            return redirect()->route('noAccess');
        }

        $data = Question::find($id);
        $data->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Record delete successfully');
    }


}
