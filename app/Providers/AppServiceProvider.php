<?php

namespace App\Providers;

use App\Playlist;
use App\Team;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('_partials.add_new_game_modal',function($view){
        	$view->with('data',Team::getAllTeams());
        });
        
        view()->composer('_partials.add_new_game_modal',function($view){
        	$view->with('statuses',Playlist::getGameStatuses());
        });
        
        view()->composer('home', function($view){
        	$view->with('teamsQty', Team::getTeamsQty());
        });
        
        view()->composer('home', function($view){
	        $user = \Auth::user();
        	$view->with('teamsFollowQty', User::teamsUserFollowsQty($user));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
