<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = ['kode_mapel', 'nama_mapel'];
    protected $table = 'sis_master_mapel';

}
