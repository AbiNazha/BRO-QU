<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_petugas', 'tanggal', 'jenis', 'jumlah', 'nominal', 'total_penjualan'
    ];

    protected $table = 'transaksipenjualan';
    public $timestamps = false;
}
