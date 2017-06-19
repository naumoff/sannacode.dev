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
	        $table->date('game_date')->default(Carbon::now());
            $table->integer('owner_id')->unsigned();
            $table->integer('guest_id')->unsigned();
			$table->integer('owner_score')->nullable();
			$table->integer('guest_score')->nullable();
			$table->enum('status',['expected','completed','cancelled','postponed']);
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('teams')->onDelete('cascade');
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
