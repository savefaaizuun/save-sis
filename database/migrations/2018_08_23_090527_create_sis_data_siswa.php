<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisDataSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sis_data_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_kelas', 10)->nullable();
            $table->integer('nis')->nullable();
            $table->string('nama_lengkap', 100);
            $table->string('nama_panggilan', 50)->nullable();
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('jns_kelamin', 2);
            $table->string('kode_agama', 2);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->integer('anak_ke')->nullable();
            $table->integer('jml_saudara')->nullable();
            $table->enum('status_anak', ['kandung', 'tiri', 'angkat']);
            $table->string('bahasa', 50);
            $table->string('nisn', 15)->nullable();
            $table->enum('status_aktif', ['Aktif','Keluar','Pindah','Lulus']);
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
        Schema::dropIfExists('sis_data_siswa');
    }
}
