<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\Permission\PermissionStoreRequest;
use App\Http\Requests\Admin\UserManagement\Permission\PermissionUpdateRequest;
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{


    public function index()
    {

        if (checkPermission('display-permission') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.user-management.permissions.index', [
            'permissions' => Permission::paginate(40),
        ]);
    }

    // create
    public function create()
    {
        if (checkPermission('create-permission') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.user-management.permissions.create', [
            'modules' => Module::all(),
        ]);
    }


    public function store(PermissionStoreRequest $request){

        if (checkPermission('create-permission') == true) {
            return redirect()->route('noAccess');
        }
        Permission::create([
            'name' => $request->name,
            'professional_name' => $request->professional_name,
            'module_id' => $request->module_id,
            'guard_name' => 'web',
        ]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permissions create done');
    }


     public function edit($id)
    {
       if (checkPermission('edit-permission') == true) {
            return redirect()->route('noAccess');
        }
        $data = Permission::find($id);
        return view('admin.user-management.permissions.edit', [
            'data' => $data,
            'modules' => Module::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        if (checkPermission('edit-permission') == true) {
            return redirect()->route('noAccess');
        }

        Permission::findOrFail($id)->update([
            'name' => $request->name,
            'professional_name' => $request->professional_name,
            'module_id' => $request->module_id,
            'guard_name' => 'web',
        ]);

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission Update done');
    }

    public function destroy($id)
    {
        if (checkPermission('delete-permission') == true) {
            return redirect()->route('noAccess');
        }
        $data = Permission::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User delete done');
    }

}
