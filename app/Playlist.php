<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';
    
    public function ownerTeam()
    {
    	return $this->belongsTo(Team::class,'owner_id','id');
    }
    
    public function guestTeam()
    {
    	return $this->belongsTo(Team::class,'guest_id','id');
    }
}
