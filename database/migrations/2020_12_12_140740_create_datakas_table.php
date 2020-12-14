<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatakasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datakas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('datapetugas');
            $table->date('tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->biginteger('total_pemasukan')->lenght(50)->unsigned();
            $table->string('bukti');
            $table->biginteger('nominal')->lenght(50)->unsigned();
            $table->string('keterangan', 50);
            $table->biginteger('saldo')->lenght(50)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datakas');
    }
}
