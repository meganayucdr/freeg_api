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
            $table->integer("giveaway_id")->unsigned()->nullable();
            $table->string("user_id");
            $table->string("status");
            $table->timestamps();

            $table->foreign('giveaway_id')
                ->refrences('id')
                ->on(giveaways)
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
