<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kriterias');
            $table->string('nama', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('subkriterias');
    }
}
