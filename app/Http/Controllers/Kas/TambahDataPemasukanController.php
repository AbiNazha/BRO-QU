<?php

namespace App\Http\Controllers\Kas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kas;
use Auth;

class TambahDataPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kas.tambahdatapemasukan');
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
            'tanggal' => 'required',
            'jumlah_pemasukan' => 'required',
            'keterangan_pemasukan' => 'required',
        ]);

        $user = Auth::user()->id;

        Kas::create([
            'id_petugas' => $user,
            'tanggal' => $request->tanggal,
            'total_pemasukan' => $request->jumlah_pemasukan,
            'keterangan_pemasukan' => $request->keterangan_pemasukan,
            'status' => 'Disetujui'
        ]);
            return redirect('pemasukan')->with('message', 'Data Berhasil Ditambahkan');

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
        //
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
        //
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
