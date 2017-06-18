<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class,50)->create();
        $teams = App\Team::all();
        foreach ($users AS $key=>$user){
        	DB::table('team_followers')->insert([
        		'team_id'=>$teams[rand(0,count($teams)-1)]->id,
		        'user_id'=>$user->id,
		        'created_at'=>Carbon::now(),
		        'updated_at'=>Carbon::now(),
	        ]);
        }
    }
}
