<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotedUserPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voted_user_polls', function (Blueprint $table) {
            $table->id();
            $table->integer('poll_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('poll_voted_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voted_user_polls');
    }
}
