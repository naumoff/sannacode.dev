<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	/**
	 * relationship table
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function teams()
    {
    	return $this->belongsToMany(
    		'App\Team',
		    'team_followers',
		    'user_id',
		    'team_id'
		    );
    }
    
    public static function teamsUserFollowsQty(User $user)
    {
		return count($user->teams);
    }
    
    public static function getAllFollowersForMatch($ownerID, $guestID)
    {
//    	$followers = \DB::select("
//			SELECT users.id,
//				users.name,
//				users.email,
//				team_followers.team_id
//			FROM users
//			LEFT JOIN team_followers
//			ON users.id = team_followers.user_id
//			WHERE team_followers.team_id IN({$ownerID},{$guestID});");
    	
    	$followers = \DB::table('users')->
		    leftJoin('team_followers','users.id', '=', 'team_followers.user_id')->
		    whereIn('team_followers.team_id',[$ownerID,$guestID])->get();
	    
    	return $followers;
    }
}
