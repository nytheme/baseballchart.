<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitcherStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitcher_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned()->index();
            $table->string('name');
            $table->string('kana');
            $table->integer('position');
            $table->integer('number');
            $table->integer('year');
            $table->integer('team_id');
            $table->integer('salary');
            $table->integer('old');
            $table->integer('weight');
            $table->integer('siai_s');
            $table->integer('win');
            $table->integer('loss');
            $table->integer('save');
            $table->integer('hold');
            $table->integer('hp');
            $table->integer('p_comp');
            $table->integer('shutout');
            $table->integer('nowalk');
            $table->float('r_win');
            $table->integer('batters');
            $table->float('inning');
            $table->integer('hit_allowed');
            $table->integer('hr_allowed');
            $table->integer('give_walk');
            $table->integer('k_en');
            $table->integer('hit_batter');
            $table->integer('strikeout');
            $table->integer('wild_pitch');
            $table->integer('balk');
            $table->integer('run_allowed');
            $table->integer('earned_run');
            $table->float('era');
            $table->float('whip');
            $table->float('qs');
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
        Schema::dropIfExists('pitcher_stats');
    }
}
