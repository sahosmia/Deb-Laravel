<?php

namespace App\Http\Controllers\Admin\CourseManagement;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class BatchController extends Controller
{

    public function index()
    {
        return view('admin.course-management.batches.index', [
            'batches' => Batch::latest()->paginate(10),
        ]);
    }


    public function students_status($student, $decision)
    {
        $student_information = StudentInformation::find($student);

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



    public function create()
    {
        return view('admin.course-management.batches.create');
    }


    public function store(Request $request){

        Batch::create([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.batches.index')->with('success', 'Batch create done');
    }


    public function edit($id)
    {
        $data = Batch::find($id);

        return view('admin.course-management.batches.edit', [
            'data' => $data,
        ]);
    }


    public function update(Request $request, $id){

        Batch::find($id)->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.batches.index')->with('success', 'Batch Update done');
    }


    public function destroy($id){

        $data = Batch::find($id);

        $data->delete();

        return redirect()->route('admin.batches.index')->with('success', 'Batch delete done');
    }


}
