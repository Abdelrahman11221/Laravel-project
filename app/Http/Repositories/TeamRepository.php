<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\TeamInterface;
use App\Http\Traits\filetrait;
use App\Models\team;
use Illuminate\Support\Facades\Validator;

class TeamRepository implements TeamInterface{
    use filetrait;
    public function team_form(){
        return view('admin_assets/design/team_form');
    }

    public function insert_team($request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'img' => 'required|mimes:jpg,jpeg,png'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Use the uploading method from the trait to handle the file upload
        $filename = $this->uploading($request->img, 'team', 'images/team');

        if ($filename === null) {
            return redirect()->back()->withErrors('Image upload failed.')->withInput();
        }

        // Create the team member
        Team::create([
            'name' => $request->name,
            'job_title' => $request->title,
            'description' => $request->description,
            'img' => $filename
        ]);

        session()->flash('success', 'Team Member added successfully');
        return redirect()->back();
    }

    public function team_list(){
        $team = team::get();
        return view('admin_assets.design.team_data' , compact('team'));
    }

    public function update_form($team_id)
    {
        $data = team::find($team_id);
        return view('admin_assets.design.update_team' , compact('data'));
    }

    public function update_team($request)
    {
        $team = team::find($request->id);
        if(!is_null($request->img)){
            unlink(public_path('images/team/' . $team->img));
            $filename = $this->uploading($request->img, 'team', 'images/team');
        }

        $team->update([
            'name' => $request->name,
            'job_title' => $request->title,
            'description' => $request->description,
            'img' => isset($filename) ? $filename : $team->img
        ]);
        session()->flash('sucess' , 'Team Member updated succefuly');
        return redirect()->back();
    }

    public function delete($request){
        $team = team::find($request->id);
        $team->delete();
        return redirect(route('team.data'));
    }
}
