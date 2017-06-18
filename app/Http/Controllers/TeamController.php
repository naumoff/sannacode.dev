<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
    	$teams = \App\Team::orderBy('created_at','desc')->paginate(15);
    	return view('includes.teams',compact('teams'));
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
	    	return redirect()->back();
	    }
    }
}
