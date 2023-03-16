<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\Role\RoleStoreRequest;
use App\Models\Module;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // index
    public function index()
    {
         if (checkPermission('display-role') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.user-management.roles.index', [
            'roles' => Role::latest()->paginate(15),
        ]);
    }

    // Create
    public function create(Request $request)
    {
        if (checkPermission('create-role') == true) {
            return redirect()->route('noAccess');
        }
        $modules = Module::with('permissions')->get();
        return view('admin.user-management.roles.create',[
            'modules' => $modules,
        ]);
    }


    // Store
    public function store(RoleStoreRequest $request)
    {
        if (checkPermission('create-role') == true) {
            return redirect()->route('noAccess');
        }
        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);
        return back()->withSuccess('Item created done');
    }

    // Edit
    public function edit($id)
    {
        if (checkPermission('edit-role') == true) {
            return redirect()->route('noAccess');
        }
        $role = Role::find($id);
        $modules = Module::with('permissions')->get();
        $permissionIds = null;
        if(!is_null($role->permissions)){
            $permissionIds = $role->permissions->pluck('id')->toArray();

        }

        return view('admin.user-management.roles.edit', [
            'role' => $role,
            'modules' => $modules,
            'permissionIds' => $permissionIds,
        ]);
    }

    // Update
    public function update(Request $request, $id)
    {
        if (checkPermission('edit-role') == true) {
            return redirect()->route('noAccess');
        }
        $role = Role::findById($id);
        $role->update(['name' => $request->name]);
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);
        return back()->with('success', 'Role update done');
    }

    public function destroy($id)
    {
        if (checkPermission('delete-role') == true) {
            return redirect()->route('noAccess');
        }
        try{
            \Spatie\Permission\Models\Role::where(['id'=>$id])->delete();
            Session::flash('success',__('message.delete_success'));
            return redirect()->route('admin.roles.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->route('admin.roles.index');
        }
    }

}
