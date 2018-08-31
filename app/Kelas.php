<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['kode_kelas', 'nama_kelas', 'tingkat', 'kode_prodi'];
    protected $table = 'sis_master_kelas';
}
