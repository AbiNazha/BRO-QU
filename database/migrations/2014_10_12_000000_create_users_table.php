<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\PseudoTypes\False_;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapetugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_petugas', 20);
            $table->string('username', 20)->unique();
            $table->string('email', 20)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat', 30);
            $table->string('no_hp', 15);
            $table->string('password');
            $table->string('jabatan', 10);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapetugas');
    }
}
