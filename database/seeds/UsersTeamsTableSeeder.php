<?php

use Illuminate\Database\Seeder;

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
    }
}
