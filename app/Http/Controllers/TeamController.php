<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Team;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
    	$teams = \App\Team::orderBy('updated_at','desc')->paginate(15);
    	return view('includes.teams',compact('teams'));
    }
    
    public function teamsEditIndex()
    {
	    $teams = \App\Team::orderBy('updated_at','desc')->paginate(15);
    	return view('includes.teams_edit', compact('teams'));
    }
    
    public function addTeam(Request $request)
    {
    	$this->validate(request(), [
    		'team_name'=> 'required | min:3'
	    ]);
    	
    	//duplicate team name check
	    $duplicateTeam = \App\Team::where('team_name','=',request()->input('team_name'))->first();
	    if($duplicateTeam){
	    	session()->flash('error_message','Team already exists!');
	    	return back();
	    }else{
	    	//saving to DB
		    $newTeam = new Team();
		    $newTeam->team_name = $request->team_name;
		    $newTeam->save();
	    	if($newTeam->id){
			    session()->flash('success_message','New Team was saved!');
		    }else{
	    		session()->flash('error_message','New Team was not saved!');
		    }
	    	return redirect('/teams-edit');
	    }
    }
    
    public function teamDelete($id)
    {
    	$teamModel = \App\Team::find($id);
    	if($teamModel->id){
    		try{
			    $teamModel->delete();
			    session()->flash('success_message','Team was deleted!');
		    }catch(QueryException $e){
			    session()->flash('error_message',"Team cannot be deleted. Delete associated games first!'");
		    }
	    }else{
		    session()->flash('error_message','Team was not found!');
	    }
    	return redirect()->back();
    }
    
    public function teamEdit($id)
    {
	    $teamModel = \App\Team::find($id);
	    return view('includes.team_edit',compact('teamModel'));
    }
    
    public function teamUpdate($id, Request $request)
    {
    	$this->validate(request(), [
    		'team_name'=>'required | min : 3'
	    ]);
    	
    	//checking for team name duplicate
	    $duplicate = \App\Team::where('team_name','=',$request->team_name)->
		    where('id','!=',$id)->first();

	    if($duplicate){
		    session()->flash('error_message','Team with name '. $request->team_name.' already exists!');
		    return redirect('/team/'.$id.'/edit');
	    }else{
		    $team = \App\Team::find($id);
		    $team->team_name = $request->team_name;
		    $team->save();
		    session()->flash('success_message',"Team was updated!");
	    }
	    return redirect('teams-edit');
    }
}
