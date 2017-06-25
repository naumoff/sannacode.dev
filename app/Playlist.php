<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';
    
    protected $fillable = [
    	'game_date',
	    'owner_id',
	    'guest_id',
	    'owner_score',
	    'guest_score',
	    'status'
    ];
    
    public function ownerTeam()
    {
    	return $this->belongsTo(Team::class,'owner_id','id');
    }
    
    public function guestTeam()
    {
    	return $this->belongsTo(Team::class,'guest_id','id');
    }
    
    public static function getGameStatuses()
    {
    	$gameStatuses = [
		    'expected',
		    'completed',
		    'cancelled',
		    'postponed'
	    ];
    	
    	return $gameStatuses;
    }
    
    public static function getGamesByDate($date)
    {
    	$games = \DB::select("
			SELECT  playlist.game_date, 
					owner.id AS ownerid, 
					owner.team_name AS owner, 
					guest.id AS guestid, 
					guest.team_name AS guest
			FROM playlist
			LEFT JOIN teams AS owner 
				ON playlist.owner_id = owner.id
			LEFT JOIN teams AS guest
				ON playlist.guest_id = guest.id
			WHERE game_date = '{$date}';") ;
    	
    	return $games;
    }
}
