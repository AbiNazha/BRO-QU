<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatapakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('datapetugas');
            $table->date('tanggal')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('jmlh_konsentrat')->lenght(30)->unsigned();
            $table->integer('jmlh_jagung')->lenght(30)->unsigned();
            $table->integer('jmlh_dedek')->lenght(30)->unsigned();
            $table->string('status', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapakan');
    }
}
