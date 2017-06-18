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
}
