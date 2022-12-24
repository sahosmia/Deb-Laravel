<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // index
    public function index()
    {
        return view('admin.user-management.roles.index', [
            'roles' => Role::latest()->paginate(15),
        ]);
    }

    // Create
    public function create(Request $request)
    {
        $modules = Module::with('permissions')->get();
        return view('admin.user-management.roles.create',[
            'modules' => $modules,
        ]);
    }


    // Store
    public function store(Request $request)
    {


        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'Role create done');
    }

    // Edit
    public function edit($id)
    {
        $data = Role::find($id);
        return view('admin.user-management.roles.edit', [
            'data' => $data,
        ]);
    }

    // Update
    public function update(Request $request, $id)
    {
        $role = Role::findById($id);
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);
        return back()->with('success', 'Role update done');
    }

}
