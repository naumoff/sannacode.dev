<?php

namespace App\Http\Controllers;

//use App\Playlist;
use App\Team;
//use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function teamsView()
    {
    	$teams = Team::with(['users'=>function($query){
    		$query->where('users.id','=',\Auth::user()->id  );
	    }])->paginate(5);
    	
    	return view('includes.dashboard.teams_to_follow',compact('teams'));
    }
    
    public function followTeam(Request $request)
    {
    	$this->validate(request(),[
    		'teamID'=>'required | numeric'
	    ]);
    	
    	$teamID = $request->teamID;
    	$user = \Auth::user();
    	$user->teams()->attach($teamID, [
    		'created_at'=>Carbon::now(),
		    'updated_at'=>Carbon::now()
	    ]);
    	
    	$team = Team::find($teamID);
    	
    	return  $team->team_name;
    }
    
    public function stopFollowTeam(Request $request)
    {
	    $this->validate(request(),[
		    'teamID'=>'required | numeric'
	    ]);
	
	    $teamID = $request->teamID;
	    $user = \Auth::user();
	    $user->teams()->detach($teamID);
	
	    $team = Team::find($teamID);
	
	    return  $team->team_name;
    }
}
