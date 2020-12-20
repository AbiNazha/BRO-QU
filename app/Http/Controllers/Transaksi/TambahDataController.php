<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kas;
use App\Transaksi;
use Auth;
use DB;

class TambahDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.transaksi.tambahdata');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'tanggal' => 'required',
        ]);

        $user = Auth::user()->id;
        $tran = Transaksi::all()->last();

        Transaksi::create([
            'id_petugas' => $user,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'nominal' => $request->harga_satuan,
            'total_penjualan' => $request->jumlah * $request->harga_satuan,
        ]);

        if ($tran != null) {
            $transaksi = $tran->id + 1;
        } else {
            $transaksi = 1;
        };

        Kas::create([
            'id_petugas' => $user,            
            'id_transaksi' => $transaksi,
            'tanggal' => $request->tanggal,
            'total_pemasukan' => $request->jumlah * $request->harga_satuan,
            'keterangan_pemasukan' => $request->jenis,
            'status' => 'Disetujui'
        ]);

            return redirect('transaksi')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('pages.transaksi.editdata')->with('transaksi', $transaksi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
        ]);

        $transaksi = Transaksi::find($id);
        $user = Auth::user()->id;
        $transaksi->id_petugas = $user;
        $transaksi->jenis = $request->input('jenis');
        $transaksi->jumlah = $request->input('jumlah');
        $transaksi->nominal = $request->input('harga_satuan');
        $transaksi->total_penjualan = $request->input('jumlah') * $request->input('harga_satuan');
        $transaksi->update();


        $pemasukan = Kas::where('id_transaksi', $id)->firstOrFail();
        $pemasukan->total_pemasukan = $request->input('jumlah') * $request->input('harga_satuan');
        $pemasukan->keterangan_pemasukan = $request->input('jenis');
        $pemasukan->update();

        return redirect('transaksi')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
