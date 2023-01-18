<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Ragistation;
use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RagistationController extends Controller
{

    public function index($batch)
    {
        $students = Ragistation::where('batch_id', $batch)->with('batch:id,title', 'user')->paginate();
        $batch_name = Batch::find($batch)->title;
        return view('admin.course-management.ragistation.index', [
            'students' => $students,
            'batch_name' => $batch_name,
        ]);
    }

    public function show($id)
    {
        $data = Ragistation::find($id);
        return view('admin.course-management.ragistation.show', [
            'data' => $data,
        ]);
    }



    public function approve($student, $decision)
    {
        $data = Ragistation::find($student);

        $user = User::find($student_information->user_id);

            if($decision == 1){
                $role_name = "Student";
            }else{
                $role_name = "User";
            }
        $user->removeRole($user->role_id);
        $role = Role::where('name', $role_name)->first();
        $user->update(['role_id' => $role->id]);
        $user->assignRole($role_name);
        $student_information->update(['status' => $decision]);

        return back();

    }





    public function edit($id)
    {
        $data = Ragistation::find($id);
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
            'facebook_link' => 'required',
            'linkedin_link' => 'required',
            'batch_id' => 'required',
        ]);

        StudentInformation::find($id)->update([
            'phone' => $request->phone,
            'whatsapp' => $request->whatsapp,
            'facebook_link' => $request->facebook_link,
            'linkedin_link' => $request->linkedin_link,
            'batch_id' => $request->batch_id,
            'user_id' => auth()->id(),
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
