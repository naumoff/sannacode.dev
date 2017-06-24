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
}
