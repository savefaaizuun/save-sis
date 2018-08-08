<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisKonfigTahunAkademikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_konfig_tahun_akademik', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun_akademik');
            $table->string('semester');
            $table->string('is_aktif');
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
        Schema::dropIfExists('sis_konfig_tahun_akademik');
    }
}
