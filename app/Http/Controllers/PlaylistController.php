<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Database\QueryException;

class PlaylistController extends Controller
{
    public function index()
    {
    	$playlist = \App\Playlist::with('ownerTeam','guestTeam')->
		    orderBy('game_date','desc')->
	        paginate(15);

    	return view('includes.playlist',compact('playlist'));
    }
    
    public function gamesEditIndex()
    {
    	$playlist = \App\Playlist::with('ownerTeam','guestTeam')->
	        orderBy('game_date','desc')->
	        paginate(15);

    	return view('includes.playlist_edit',compact('playlist'));
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
    	
    	$newGame = new Playlist();
    	$newGame->game_date = $request->input('game_date');
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
	    return redirect('/games-edit');
    	
    }
    
    public function gameDelete($id)
    {
	    $gameModel = \App\Playlist::find($id);
	    if($gameModel->id){
		    try{
			    $gameModel->delete();
			    session()->flash('success_message','Game was deleted!');
		    }catch( QueryException $e){
			    session()->flash('error_message',"Game was not deleted!'");
		    }
	    }else{
		    session()->flash('error_message','Game was not found!');
	    }
	    return redirect()->back();
    }
	
	public function gameEdit($id)
	{
		$gameModel = \App\Playlist::find($id);
		$allTeams = \App\Team::getAllTeams();
		$gameStatuses = \App\Playlist::getGameStatuses();
		return view('includes.game_edit',compact([
			'gameModel',
			'allTeams',
			'gameStatuses'
		]));
	}
	
	public function gameUpdate(Request $request, $id)
	{
		$this->validate(request(),[
			'game_date'=>'required |date_format:Y-m-d',
		]);
		
		$updatedModel = \App\Playlist::find($id);
		
		if($updatedModel){
			$updatedModel->update($request->all());
			if($updatedModel->id){
				session()->flash('success_message',"The Game was updated!");
			}
		}else{
			session()->flash('error_message',"The Game you are trying to update was deleted!");
			return redirect()->back();
		}
		
		return redirect('/games-edit');
	}
}
