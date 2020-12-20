<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_petugas', 'id_transaksi', 'tanggal', 'total_pemasukan', 'bukti', 'nominal', 'keterangan_pemasukan', 'keterangan', 'status',
    ];

    protected $attributes = [
        'total_pemasukan' => 0,
        'nominal' => 0,
        'bukti' => '',
        'keterangan' => '',
        'keterangan_pemasukan' => '',
     ];

    protected $table = 'datakas';
    public $timestamps = false;
}
