<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatatelurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatelur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('datapetugas');
            $table->date('tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('jmlh_telurjual')->lenght(30)->unsigned();
            $table->integer('jmlh_telurrusak')->lenght(30)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datatelur');
    }
}
