<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandingkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('banding_kriterias', function (Blueprint $table) {
            $table->integer('id_kriteria');
            $table->integer('id_banding_kriteria');
            $table->float('nilai');
            $table->enum('status', ['kriteria', 'subkriteria']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bandingkriterias');
    }
}
