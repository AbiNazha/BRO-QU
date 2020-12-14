<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'usia_ayam'
    ];

    public function ayam(){
        return $this->hasMany(Ayam::class);
    }

    protected $table = 'datakandang';
    public $timestamps = false;
}
