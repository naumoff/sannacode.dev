<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
    	$playlist = \App\Playlist::with('ownerTeam','guestTeam')->
		    orderBy('game_date','desc')->
	        paginate(15);
    	return view('includes.playlist',compact('playlist'));
    }
    
    public function addGame(Request $request)
    {
    	$this->validate($request,[
    		'game_date' => 'date | required',
		    'owner_id' => 'required | numeric',
		    'guest_id' => 'required | numeric',
		    'owner_score' => 'numeric | min:0 max:20 | nullable',
		    'quest_score' => 'numeric | min:0 max:20 | nullable',
		    'status' => 'required | string'
	    ]);
    	
    	$correctDate = $this->correctDateFormat($request->game_date);
    	
    	$newGame = new Playlist();
    	$newGame->game_date = $correctDate;
    	$newGame->owner_id = $request->input('owner_id');
    	$newGame->guest_id = $request->input('guest_id');
    	$newGame->owner_score = $request->input('owner_score');
    	$newGame->guest_score = $request->input('guest_score');
    	$newGame->status = $request->input('status');
    	$newGame->save();
	
	    if($newGame->id){
		    session()->flash('success_message','New Game was saved!');
	    }else{
		    session()->flash('error_message','New Game was not saved!');
	    }
	    return redirect()->back();
    	
    }
    
    public function correctDateFormat($incorrectDate){
    	$dateArray = explode('/', $incorrectDate);
    	return $dateArray[2].'-'.$dateArray[0].'-'.$dateArray[1];
    }
}
