<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telur extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_petugas', 'jmlh_telurjual', 'jmlh_telurrusak', 'stok_telur',
    ];

    protected $table = 'datatelur';
    public $timestamps = false;
}
