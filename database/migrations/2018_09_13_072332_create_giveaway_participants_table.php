<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiveawayParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giveaway_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giveaway_id')->unsigned()->nullable();;
            $table->integer('user_id')->unsigned()->nullable();;
            $table->string('status');
            $table->timestamps();

            $table->foreign('giveaway_id')->references('id')
                                      ->on('giveaways')
                                      ->onUpdate('cascade')
                                      ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giveaway_participants');
    }
}
