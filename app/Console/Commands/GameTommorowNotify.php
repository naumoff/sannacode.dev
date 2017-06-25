<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\NewGameSoon;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Playlist;
use App\User;

class GameTommorowNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'followers:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification NewGameSoon to all followers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    $tomorrowObject = Carbon::now()->addDays(1);
	    $year = $tomorrowObject->year;
	    $month = $tomorrowObject->month;
	    if(strlen($month)===1){
		    $month = '0'.$month;
	    }
	    $day = $tomorrowObject->day;
	    if(strlen($day)===1){
		    $day = '0'.$day;
	    }
	    $tomorrowDate = $year.'-'.$month.'-'.$day;
	
	    $tommorowGames = Playlist::getGamesByDate($tomorrowDate);
	
	    $data = [];
	
	    foreach ($tommorowGames AS $key=>$game){
		    $gameFollowers = User::getAllFollowersForMatch(
			    $game->ownerid,
			    $game->guestid);
		
		    if(count($gameFollowers)>0){
			    $gameFollowers = $this->getUniqueFollowersForMatch($gameFollowers);
			    $data[$key]['game'] = $game;
			    $data[$key]['followers'] = $gameFollowers;
		    }else{
			    continue;
		    }
	    }
	
	    if(count($data)>0){
		    foreach ( $data AS $matchData){
			    Notification::send($matchData['followers'],new NewGameSoon($matchData['game']));
		    }
	    }
        $this->info('Notifictions sent');
    }
	
	/**
	 * done in order to avoid sending 2 notifications for 1 user that follows
	 * both teams in one match.
	 * @param $gameFollowers
	 * @return array
	 */
	private function getUniqueFollowersForMatch($gameFollowers)
	{
		$userIDs = [];
		foreach ($gameFollowers AS $key=>$follower){
			if(in_array($follower->user_id, $userIDs)){
				continue;
			}
			$userIDs[] = $follower->user_id;
		}
		
		return User::find($userIDs);
	}
}
