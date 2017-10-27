<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAhpSiswasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ahp_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswas')->unsigned();
            $table->double('nilai_rata', 3, 3);
            $table->double('tingkat_hadir', 3, 3);
            $table->double('sikap', 3, 3);
            $table->double('jumlah_extra', 3, 3);
            $table->double('total', 3, 3);
            $table->timestamps();

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
        Schema::drop('ahp_siswas');
    }
}
