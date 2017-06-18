<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
    	$playlist = \App\Playlist::with('ownerTeam','guestTeam')->
		    orderBy('game_datetime','desc')->
	        paginate(15);
    	return view('includes.playlist',compact('playlist'));
    }
    
    public function addGame(Request $request)
    {
    	$this->validate($request,[
    		'game_datetime' => 'date | required',
		    'owner_id' => 'required | numeric',
		    'guest_id' => 'required | numeric',
		    'owner_score' => 'numeric | min:0 max:20 | nullable',
		    'quest_score' => 'numeric | min:0 max:20 | nullable',
		    'status' => 'required | string'
	    ]);
    	
    	dd($request);
    	
    }
}
