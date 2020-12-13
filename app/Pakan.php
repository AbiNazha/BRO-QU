<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_petugas', 'jmlh_konsentrat', 'jmlh_jagung', 'jmlh_dedek', 'status',
    ];

    protected $table = 'datapakan';
    public $timestamps = false;
}
