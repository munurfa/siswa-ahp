<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatrikHasilTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('matrik_hasils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kriteria', 20);
            $table->float('prioritas');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('matrik_hasils');
    }
}
