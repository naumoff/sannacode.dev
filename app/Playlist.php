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
}
