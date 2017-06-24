<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	protected $fillable = ['team_name'];
	
	/**
	 * relationship table
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany(
			'App\User',
			'team_followers',
			'team_id',
			'user_id'
		);
	}
	
	/**
	 * relationship table
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function ownerPlays()
    {
    	return $this->hasMany(Playlist::class,'owner_id','id');
    }
	
	/**
	 * relationship table
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function guestPlays()
    {
    	return $this->hasMany(Playlist::class,'guest_id','id');
    }
    
    public static function getAllTeams()
    {
    	$teams = \DB::table('teams')->get();
    	return $teams;
    }
	
	/**
	 * used in cabinet to show teams qty in menu
	 * @return int
	 */
    public static function getTeamsQty()
    {
    	return count(self::getAllTeams());
    }
}
