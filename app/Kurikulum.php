<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    protected $fillable = ['nama_kurikulum', 'is_aktif'];
    protected $table = 'sis_konfig_kurikulum';
}
