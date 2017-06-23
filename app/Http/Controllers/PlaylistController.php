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
    
    public function gamesEditIndex(Request $request)
    {
    	$availableStatuses = Playlist::getGameStatuses();
    	foreach ($availableStatuses AS $key=>$status){
    		$statusList[$key] = '"'.$status.'"';
	    }
    	$statusList = implode(",", $statusList);
	    
	    $playlist = Playlist::where('id','>',0);

	   	if($request->secret == 777){
    		$this->validate(request(), [
			    'game_date' =>'nullable |date_format:Y-m-d',
			    'owner' => 'nullable | string | min:3 | max:20',
			    'quest' => 'nullable | string | min:3 | max:20',
			    'status' => "nullable | in: {$statusList}"
		    ]);
    		
    		if(!empty($request->game_date)){
    			session(['game_date'=>$request->game_date]);
    			$playlist = $playlist->
			        where('game_date','=',$request->game_date);
		    }else{
			    session(['game_date'=>null]);
		    }
		    
		    if(!empty($request->owner)){
    			session(['owner'=>$request->owner]);
    			$playlist = $playlist->whereHas('ownerTeam',function($query){
    				$query->where('team_name','LIKE',"%".session('owner')."%");
			    });
		    }else{
			    session(['owner'=>null]);
		    }
		    
		    if(!empty($request->guest)){
    			session(['guest'=>$request->guest]);
    			$playlist = $playlist->whereHas('guestTeam',function($query){
    				$query->where('team_name','LIKE',"%".session('guest')."%");
			    });
		    }else{
			    session(['guest'=>null]);
		    }
		    
		    if(!empty($request->status)){
    			session(['status'=>$request->status]);
    			$playlist = $playlist->where('status', '=', session('status'));
		    }else{
			    session(['status'=>null]);
		    }
	    }
    	
    	$playlist = $playlist->orderBy('game_date','desc')->paginate(15);

    	return view('includes.playlist_edit',
		    compact('playlist','availableStatuses'));
    }
    
    public function clearFilters(Request $request)
    {
    	$request->session()->flush();
    	return redirect()->back();
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
