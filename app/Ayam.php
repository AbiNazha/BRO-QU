<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayam extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_petugas', 'jmlh_ayam_aktif', 'jmlh_ayam_tdk_aktif', 'jmlh_ayam_sakit', 'jmlh_ayam_mati',
    ];

    protected $table = 'dataayam';
    public $timestamps = false;
}
