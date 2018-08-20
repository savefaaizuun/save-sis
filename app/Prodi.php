<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['kode_prodi', 'nama_prodi'];
    protected $table = 'sis_master_prodi';
}
