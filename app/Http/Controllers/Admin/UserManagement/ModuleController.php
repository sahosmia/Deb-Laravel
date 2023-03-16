<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\Module\ModuleStoreRequest;
use App\Http\Requests\Admin\UserManagement\Module\ModuleUpdateRequest;
use App\Models\Module;
use Illuminate\Http\Request;


class ModuleController extends Controller
{

    public function index()
    {
        if (checkPermission('display-module') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.user-management.modules.index', [
            'modules' => Module::latest()->paginate(10),
        ]);
    }


    public function create()
    {
        if (checkPermission('create-module') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.user-management.modules.create');
    }


    public function store(ModuleStoreRequest $request){

        if (checkPermission('create-module') == true) {
            return redirect()->route('noAccess');
        }
        Module::create([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.modules.index')->with('success', 'Recode Create Successfully!');
    }


    public function edit($id)
    {
        if (checkPermission('edit-module') == true) {
            return redirect()->route('noAccess');
        }
        $data = Module::find($id);

        return view('admin.user-management.modules.edit', [
            'data' => $data,
        ]);
    }


    public function update(ModuleUpdateRequest $request, $id){

        if (checkPermission('edit-module') == true) {
            return redirect()->route('noAccess');
        }
        Module::find($id)->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.modules.index')->with('success', 'Recode Update Successfully!');
    }


    public function destroy($id){

        if (checkPermission('delete-module') == true) {
            return redirect()->route('noAccess');
        }
        $data = Module::find($id);

        $data->delete();

        return redirect()->route('admin.modules.index')->with('success', 'Recode Delete Successfully!');
    }


}
