<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned()->index();
            $table->string('name');
            $table->string('kana');
            $table->integer('position');
            $table->integer('number');
            $table->integer('year');
            $table->string('team_id');
            $table->integer('siai_s');
            $table->integer('dasek_s');
            $table->integer('da_s');
            $table->integer('score');
            $table->integer('hit');
            $table->integer('two_h');
            $table->integer('three_h');
            $table->integer('hr');
            $table->integer('rui_h');
            $table->integer('rbi');
            $table->integer('steal');
            $table->integer('c_steal');
            $table->integer('s_hit');
            $table->integer('s_fly');
            $table->integer('walk');
            $table->integer('k_en');
            $table->integer('hbp');
            $table->integer('s_out');
            $table->integer('d_play');
            $table->float('da_ave');
            $table->float('o_b_ave');
            $table->float('sl_ave');
            $table->float('ops');
            $table->integer('salary');
            $table->integer('old');
            $table->integer('weight');
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
        Schema::dropIfExists('statistics');
    }
}
