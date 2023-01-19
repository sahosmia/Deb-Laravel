<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Ragistation;
use App\Models\StudentInformation;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RagistationController extends Controller
{

    public function index()
    {
        $students = Ragistation::latest()->paginate(10);
        return view('admin.course-management.ragistation.index', [
            'students' => $students,
        ]);
    }

    public function show($id)
    {
        $data = Ragistation::find($id);
        return view('admin.course-management.ragistation.show', [
            'data' => $data,
        ]);
    }



    public function approve($id)
    {
        $data = Ragistation::find($id);

        $new_data = [
            'date_of_birth' => $data->date_of_birth,
            'facebook' => $data->facebook,
            'linkedin' => $data->linkedin,
            'drive' => $data->drive,
            'address' => $data->address,
            'phone' => $data->phone,
            'whatsapp' => $data->whatsapp,
            'batch_id' => $data->batch_id,
            'user_id' => $data->user_id,
        ];


        $user_information = UserInformation::where('user_id', $data->user_id)->first();

            $user_information->update($new_data);

        $user = User::find($data->user_id);

        $role_name = "Student";

        $user->removeRole($user->role_id);
        $role = Role::where('name', $role_name)->first();
        $user->update(['role_id' => $role->id]);
        $user->assignRole($role_name);

        $data->delete();
        return back();

    }





    public function edit($id)
    {
        $data = Ragistation::find($id);
        $batches = Batch::all();

        return view('admin.course-management.ragistation.edit', [
            'data' => $data,
            'batches' => $batches,
        ]);
    }


    public function update(Request $request, $id){

        $request->validate([
            'phone' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'batch_id' => 'required',
        ]);

        Ragistation::find($id)->update([
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'drive' => $request->drive,
            'batch_id' => $request->batch_id,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return back()->with('success', 'Batch Update done');
    }


    public function destroy($id){

        $data = Ragistation::find($id);

        $data->delete();

        return back()->with('success', 'Batch delete done');
    }


}
