<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\User\UserStoreRequest;
use App\Http\Requests\Admin\UserManagement\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {

        if (checkPermission('display-user') == true) {
            return redirect()->route('noAccess');
        }

        return view('admin.user-management.users.index', [
            'users' => User::latest()->paginate(10),
            // 'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        if (checkPermission('create-user') == true) {
            return redirect()->route('noAccess');
        }
        return view('admin.user-management.users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(UserStoreRequest $request)
    {
         if (checkPermission('create-user') == true) {
            return redirect()->route('noAccess');
        }

        $new_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        $role = Role::findById($request->role_id);

        $user = User::find($new_user->id);
        $user->assignRole($role->name);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User create done');
    }

    public function edit($id)
    {
         if (checkPermission('edit-user') == true) {
            return redirect()->route('noAccess');
        }
        $data = User::find($id);
        return view('admin.user-management.users.edit', [
            'roles' => Role::all(),
            'data' => $data,
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
         if (checkPermission('edit-user') == true) {
            return redirect()->route('noAccess');
        }

        $user = User::findOrFail($id);

        $old_role_id = $user->role_id;

        if ($old_role_id != $request->role_id) {
            $user->removeRole($old_role_id);

            $role = Role::findById($request->role_id);
            $user->assignRole($role->name);
        }

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User Update done');
    }

    public function destroy($id)
    {
         if (checkPermission('delete-user') == true) {
            return redirect()->route('noAccess');
        }
        $data = User::findOrFail($id);

        $data->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User delete done');
    }
}
