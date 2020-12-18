<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth', 'cekjabatan:Pemilik']], function () {
    Route::get('petugas', 'Petugas\PetugasController@index')->name('petugas');
    Route::get('pakan', 'Pakan\PakanController@index')->name('pakan');
    Route::get('telur', 'Telur\TelurController@index')->name('telur');

    Route::get('petugas/tambahdata', 'Petugas\TambahDataController@index')->name('tambahdata');
    Route::post('petugas/tambahdata', 'Petugas\TambahDataController@store')->name('postdata');

    Route::get('petugas/edit/{id}', 'Petugas\TambahDataController@edit');
    Route::put('petugas/edit/data-update/{id}', 'Petugas\TambahDataController@update');
});

Route::group(['middleware' => ['auth', 'cekjabatan:Pengawas']], function () {
    Route::get('ayam/tambahdata', 'Ayam\TambahDataController@index')->name('tambahdataayam');
    Route::post('ayam/tambahdata', 'Ayam\TambahDataController@store')->name('postdataayam');

    Route::get('ayam/edit/{id}', 'Ayam\TambahDataController@edit');
    Route::put('ayam/edit/data-update/{id}', 'Ayam\TambahDataController@update');

    Route::get('/hitung-pakan', 'Pakan\HitungPakanController@index')->name('hitungpakan');
    Route::post('/hitung-pakan', 'Pakan\HitungPakanController@hitungpakan')->name('posthitungpakan');

    Route::get('pakan/tambahdata', 'Pakan\TambahDataController@index')->name('tambahdatapakan');
    Route::post('pakan/tambahdata', 'Pakan\TambahDataController@store')->name('postdatapakan');

    Route::get('pakan/edit/{id}', 'Pakan\TambahDataController@edit');
    Route::put('pakan/edit/data-update/{id}', 'Pakan\TambahDataController@update');


    Route::get('telur/tambahdata', 'Telur\TambahDataController@index')->name('tambahdatatelur');
    Route::post('telur/tambahdata', 'Telur\TambahDataController@store')->name('postdatatelur');

    Route::get('telur/edit/{id}', 'Telur\TambahDataController@edit');
    Route::put('telur/edit/data-update/{id}', 'Telur\TambahDataController@update');

    Route::get('kandang/tambahdata', 'Kandang\TambahDataController@index')->name('tambahdatakandang');
    Route::post('kandang/tambahdata', 'Kandang\TambahDataController@store')->name('postdatakandang');

    Route::get('kandang/edit/{id}', 'Kandang\TambahDataController@edit');
    Route::put('kandang/edit/data-update/{id}', 'Kandang\TambahDataController@update');
});

Route::group(['middleware' => ['auth', 'cekjabatan:Pengelola']], function () {
    Route::get('transaksi/tambahdata', 'Transaksi\TambahDataController@index')->name('tambahdatatransaksi');
    Route::post('transaksi/tambahdata', 'Transaksi\TambahDataController@store')->name('postdatatransaksi');
});

Route::group(['middleware' => ['auth', 'cekjabatan:Pemilik,Pengelola']], function () {
    Route::get('transaksi', 'Transaksi\TransaksiController@index')->name('transaksi');
    Route::get('saldo', 'Kas\KasController@index')->name('saldo');

    Route::get('pemasukan', 'Kas\KasController@pemasukan')->name('pemasukan');
    Route::get('pemasukan/tambahdata', 'Kas\TambahDataPemasukanController@index')->name('tambahdatapemasukan');
    Route::post('pemasukan/tambahdata', 'Kas\TambahDataPemasukanController@store')->name('postdatapemasukan');

    Route::get('pengeluaran', 'Kas\KasController@pengeluaran')->name('pengeluaran');
    Route::get('pengeluaran/tambahdata', 'Kas\TambahDataPengeluaranController@index')->name('tambahdatapengeluaran');
    Route::post('pengeluaran/tambahdata', 'Kas\TambahDataPengeluaranController@store')->name('postdatapengeluaran');
});

Route::group(['middleware' => ['auth', 'cekjabatan:Pemilik,Pengawas']], function () {
    Route::get('pakan', 'Pakan\PakanController@index')->name('pakan');
});

Route::group(['middleware' => ['auth', 'cekjabatan:Pemilik,Pengelola,Pengawas']], function () {
    Route::get('telur', 'Telur\TelurController@index')->name('telur');
    Route::get('ayam', 'Ayam\AyamController@index')->name('ayam');
    Route::get('kandang', 'Kandang\KandangController@index')->name('kandang');

    Route::get('editprofile', 'EditProfilController@index')->name('editprofile');
    Route::post('editprofile', 'EditProfilController@store')->name('post.editprofile');
});
