<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = ['tahun_akademik', 'semester'];
    protected $table = 'sis_konfig_tahun_akademik';
}
