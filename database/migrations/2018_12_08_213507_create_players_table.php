<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('kana');
            $table->integer('position');
            $table->date('dob');
            $table->integer('height');
            $table->string('blood');
            $table->string('p');
            $table->string('b');
            $table->string('home');
            $table->integer('join');
            $table->integer('team');
            $table->string('career');
            $table->string('draft');
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
        Schema::dropIfExists('players');
    }
}
