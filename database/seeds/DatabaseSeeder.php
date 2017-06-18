<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//order is important!!!
         $this->call(TeamsPlaylistTableSeeder::class);
	     $this->call(UsersTeamsTableSeeder::class);
    }
}
