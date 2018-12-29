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
            $table->integer('team');
            $table->integer('season');
            $table->integer('number');
            $table->string('name');
            $table->string('kana');
            $table->date('dob');
            $table->integer('old');
            $table->integer('join');
            $table->integer('years');
            $table->integer('height');
            $table->integer('weight');
            $table->string('p');
            $table->string('b');
            $table->string('position');
            $table->string('home');
            $table->string('blood');
            $table->integer('salary');
            $table->string('career')->nullable();
            $table->string('draft')->nullable();
            $table->string('team_id');
            $table->integer('siai_s');
            $table->integer('win');
            $table->integer('loss');
            $table->integer('save');
            $table->integer('hold');
            $table->integer('hp');
            $table->integer('p_comp');
            $table->integer('shutout');
            $table->integer('nowalk');
            $table->double('r_win');
            $table->integer('batters');
            $table->double('inning');
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
            $table->double('era');
            $table->double('whip');
            $table->double('hit_allowed_ave');
            $table->double('hr_allowed_ave');
            $table->double('strikeout_ave');
            $table->double('give_ave');
            $table->double('qs');
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
