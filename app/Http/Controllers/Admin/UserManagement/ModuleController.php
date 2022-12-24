<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;


class ModuleController extends Controller
{

    public function index()
    {
        return view('admin.user-management.modules.index', [
            'modules' => Module::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        return view('admin.user-management.modules.create');
    }


    public function store(Request $request){

        Module::create([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.modules.index')->with('success', 'Module create done');
    }


    public function edit($id)
    {
        $data = Module::find($id);

        return view('admin.user-management.modules.edit', [
            'data' => $data,
        ]);
    }


    public function update(Request $request, $id){

        Module::find($id)->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.modules.index')->with('success', 'Module Update done');
    }


    public function destroy($id){

        $data = Module::find($id);

        $data->delete();

        return redirect()->route('admin.modules.index')->with('success', 'Module delete done');
    }


}
