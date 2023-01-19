<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{

    public function index($batch = null)
    {
        $students = UserInformation::whereNotNull('batch_id');

        if($batch != null){
            $students = $students->where('batch_id', $batch);
        }

        $students = $students->latest()->paginate(10);

        return view('admin.course-management.students.index', [
            'students' => $students,
        ]);

    }



    public function show($id)
    {
        $data = UserInformation::find($id);
        return view('admin.course-management.students.show', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
        $data = UserInformation::find($id);
        $batches = Batch::all();

        return view('admin.course-management.students.edit', [
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
            'payment_amount' => 'required',
        ]);

        UserInformation::find($id)->update([
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'drive' => $request->drive,
            'batch_id' => $request->batch_id,
            'address' => $request->address,
            'payment_amount' => $request->payment_amount,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return back()->with('success', 'User Update done');
    }



    public function destroy($id){

        $data = UserInformation::find($id);

        $user = User::find($data->user_id);

        $role_name = "User";

        $user->removeRole($user->role_id);
        $role = Role::where('name', $role_name)->first();
        $user->update(['role_id' => $role->id]);
        $user->assignRole($role_name);

        $data->delete();

        return back()->with('success', 'User delete done');
    }


}
