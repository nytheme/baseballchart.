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
            $table->string('team');
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
            $table->string('title')->nullable();
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
            $table->double('da_ave');
            $table->double('o_b_ave');
            $table->double('sl_ave');
            $table->double('ops');
            $table->double('hr_ave');
            $table->double('s_out_ave');
            $table->double('walk_ave');
            
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
