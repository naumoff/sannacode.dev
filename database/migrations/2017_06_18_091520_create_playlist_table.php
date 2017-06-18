<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreatePlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist', function (Blueprint $table) {
            $table->increments('id');
	        $table->dateTime('game_datetime')->default(Carbon::now());
            $table->integer('owner_id')->unsigned();
            $table->integer('guest_id')->unsigned();
			$table->integer('owner_score');
			$table->integer('quest_score');
			$table->integer('winner_id')->unsigned();
			$table->enum('status',['expected','completed','cancelled','postponed']);
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('teams');
            $table->foreign('guest_id')->references('id')->on('teams');
            $table->foreign('winner_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist');
    }
}
