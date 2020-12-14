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
        'id_petugas', 'id_kandang', 'jmlh_ayam_produktif', 'jmlh_ayam_belum_produktif', 'jmlh_ayam_tidak_produktif', 'jmlh_ayam_sakit', 'jmlh_ayam_mati',
    ];

    public function kandang(){
        return $this->belongsTo(Kandang::class);
    }

    protected $table = 'dataayam';
    public $timestamps = false;
}
