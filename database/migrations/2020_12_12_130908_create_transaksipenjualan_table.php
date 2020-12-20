<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksipenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksipenjualan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('datapetugas');
            $table->date('tanggal');
            $table->string('jenis', 20);
            $table->biginteger('jumlah')->lenght(30)->unsigned();
            $table->biginteger('nominal')->lenght(30)->unsigned();
            $table->biginteger('total_penjualan')->lenght(30)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksipenjualan');
    }
}
