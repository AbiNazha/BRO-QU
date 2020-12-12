<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datapetugas')->insert([
            'nama_petugas' => 'Abizar Nazha Rizky',
            'username' => 'Abizar',
            'email' => 'abizarpc17@gmail.com',
            'alamat' => 'Jln Diponegoro',
            'no_hp' => '081123456789',
            'password' => bcrypt('admin'),
            'jabatan' => 'Pemilik',
        ]);
        DB::table('datapetugas')->insert([
            'nama_petugas' => 'Pengawas',
            'username' => 'Pengawas',
            'email' => 'pengawas@gmail.com',
            'alamat' => 'Jln Diponegoro',
            'no_hp' => '081123456789',
            'password' => bcrypt('pengawas'),
            'jabatan' => 'Pengawas',
        ]);
        DB::table('datapetugas')->insert([
            'nama_petugas' => 'Pengelola',
            'username' => 'Pengelola',
            'email' => 'pengelola@gmail.com',
            'alamat' => 'Jln Diponegoro',
            'no_hp' => '081123456789',
            'password' => bcrypt('pengelola'),
            'jabatan' => 'Pengelola',
        ]);
    }
}
