<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = ['team_name'];
    public function ownerPlays()
    {
    	return $this->hasMany(Playlist::class,'owner_id','id');
    }
    
    public function guestPlays()
    {
    	return $this->hasMany(Playlist::class,'guest_id','id');
    }
    
}
