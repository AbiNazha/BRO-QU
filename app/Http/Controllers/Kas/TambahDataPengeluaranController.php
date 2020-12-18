<?php

namespace App\Http\Controllers\Kas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kas;
use Auth;

class TambahDataPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kas.tambahdatapengeluaran');
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
            'jumlah_pengeluaran' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user()->id;
        $file = $request->file('image');
        $request->image->move(public_path('images'),$file->getClientOriginalName());
        // $imageName = time().'.'.request()->image->getClientOriginalExtension();
        // $request->image->move(public_path('images'), $imageName);

        Kas::create([
            'id_petugas' => $user,
            'tanggal' => $request->tanggal,
            'nominal' => $request->jumlah_pengeluaran,
            'keterangan' => $request->keterangan,
            'bukti' => $file->getClientOriginalName(),
            'status' => 'Menunggu Persetujuan'
        ]);
            return redirect('pengeluaran')->with('message', 'Data Berhasil Ditambahkan');

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
