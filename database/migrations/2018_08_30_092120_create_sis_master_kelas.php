<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisMasterKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_master_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kelas', 10);
            $table->string('nama_kelas', 50);
            $table->string('tingkat', 5);
            $table->string('prodi', 5);
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
        Schema::dropIfExists('sis_master_kelas');
    }
}
