<?php

namespace App\Http\Controllers\Admin\GenaralContent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenaralContent\Team\TeamStoreRequest;
use App\Http\Requests\Admin\GenaralContent\Team\TeamUpdateRequest;
use App\Models\Team;
use Illuminate\Support\Facades\Session;
use Image;

class TeamController extends Controller
{

    public function index()
    {
        return view('admin.genaral-content.teams.index', [
            'teams' => Team::latest()->paginate(10),
        ]);
    }




    public function create()
    {
        return view('admin.genaral-content.teams.create');
    }


    public function store(TeamStoreRequest $request){

        $inputs = $request->only("name", "designation", "facebook", "linkedin", "twitter", "instragram", "youtube", "is_active");
        $inputs['added_by'] = auth()->id();

        if($request->hasFile("image")){
            $image = Image::make($request->file('image'));
            $imageName = 'Team-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/team/');
            $image->resize(350,350);
            $image->save($destinationPath.$imageName);
            $inputs['image'] = $imageName;
        }

        try{
            Team::create($inputs);
            Session::flash('success',"Record create successfully");
            return redirect()->route('admin.teams.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function show($id)
    {
        $data = Team::find($id);

        return view('admin.genaral-content.teams.details', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
        $data = Team::find($id);

        return view('admin.genaral-content.teams.edit', [
            'data' => $data,
        ]);
    }


    public function update(TeamUpdateRequest $request, $id){

        $inputs = $request->only("name", "designation", "facebook", "linkedin", "twitter", "instragram", "youtube", "is_active");
        $inputs['added_by'] = auth()->id();

        if($request->hasFile("image")){
            $currentImage = Team::find($id)->image;
            unlink(public_path('upload/team/'.$currentImage));

            $image = Image::make($request->file('image'));
            $imageName = 'team-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path('upload/team/');
            $image->resize(350,350);
            $image->save($destinationPath.$imageName);
            $inputs['image'] = $imageName;
        }

        try{
            Team::find($id)->update($inputs);
            Session::flash('success',"Record update successfully");
            return redirect()->route('admin.teams.index');
        }catch (\Exception $exception){
            Session::flash('error',$exception->getMessage());
            return redirect()->back();
        }
    }


    public function destroy($id){

        $data = Team::find($id);
        unlink(public_path('upload/team/'.$data->image));
        $data->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Record delete successfully');
    }


}
