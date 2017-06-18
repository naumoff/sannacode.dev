<?php

namespace App\Providers;

use App\Playlist;
use App\Team;
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
