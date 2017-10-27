<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('nilai_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswas')->unsigned();
            $table->float('nilai_rata');
            $table->string('tingkat_hadir', 20);
            $table->enum('sikap', ['A', 'B', 'C', 'D']);
            $table->string('jumlah_extra', 20);
            $table->timestamps();
            $table->index('id_siswas');
            $table->foreign('id_siswas')
                  ->references('id')->on('siswas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('nilaisiswas');
    }
}
