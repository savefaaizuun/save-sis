<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = ['tahun_akademik', 'semester', 'is_aktif'];
}
