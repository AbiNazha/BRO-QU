<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataayamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataayam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('datapetugas');
            $table->date('tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('jmlh_ayam_aktif')->lenght(30)->unsigned();
            $table->integer('jmlh_ayam_tdk_aktif')->lenght(30)->unsigned();
            $table->integer('jmlh_ayam_sakit')->lenght(30)->unsigned();
            $table->integer('jmlh_ayam_mati')->lenght(30)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dataayam');
    }
}
