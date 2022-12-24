<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{


    public function index()
    {
        return view('admin.user-management.permissions.index', [
            'permissions' => Permission::latest()->paginate(10),
        ]);
    }

    // create
    public function create()
    {
        return view('admin.user-management.permissions.create', [
            'modules' => Module::all(),
        ]);
    }


    public function store(Request $request){

        Permission::create([
            'name' => $request->name,
            'professional_name' => $request->professional_name,
            'module_id' => $request->module_id,
            'guard_name' => 'web',
        ]);

        return redirect()->route('admin.permissions.index')->with('success', 'Permissions create done');




    }


}
