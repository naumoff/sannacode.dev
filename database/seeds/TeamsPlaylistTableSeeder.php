<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TeamsPlaylistTableSeeder extends Seeder
{
	// enum values of column playlist.status
	private $oldMatchStatuses = [
		'completed',
	];
	
	private $newMatchStatuses = [
		'expected',
		'cancelled',
		'postponed'
	];
	
	private $currentDate;
	
	public function __construct() {
		
		$this->currentDate = Carbon::today('Europe/London');
	}
	
	
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = factory(App\Team::class,30)->make();
        foreach ($teams AS $key=>$team){
        	$team->save();
        	if($key > 3){
        		$ownerID = $teams[$key-2]->id;
        		$guestID = $teams[$key-1]->id;
        		$matchDate = $this->randomMatchDate();
        		
        		if($this->currentDate > $matchDate){
			        DB::table('playlist')->insert([
				        'game_datetime'=>$matchDate,
				        'owner_id'=>$ownerID,
				        'guest_id'=>$guestID,
				        'owner_score'=>rand(0,15),
				        'guest_score'=>rand(0,15),
				        'status'=>$this->oldMatchStatuses[rand(0,count($this->oldMatchStatuses)-1)],
				        'created_at'=>Carbon::now(),
				        'updated_at'=>Carbon::now(),
			        ]);
		        }else{
			        DB::table('playlist')->insert([
				        'game_datetime'=>$matchDate,
				        'owner_id'=>$ownerID,
				        'guest_id'=>$guestID,
				        'owner_score'=> null,
				        'guest_score'=> null,
				        'status'=>$this->newMatchStatuses[rand(0,count($this->newMatchStatuses)-1)],
				        'created_at'=>Carbon::now(),
				        'updated_at'=>Carbon::now(),
			        ]);
		        }
	        }
        }
    }
	
	private function randomMatchDate()
	{
		$yearMin = $this->currentDate->year -3 ;
		$yearMax = $this->currentDate->year + 1;
		$year = rand($yearMin,$yearMax);
		$month = rand(1,12);
		$day = rand(1,28);
		return Carbon::createFromDate($year,$month,$day,'Europe/London');
	}
}
