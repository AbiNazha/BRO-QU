<?php

namespace App\Http\Controllers\Kandang;

use App\Ayam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kandang;
use App\Pakan;
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
        return view('pages.kandang.tambahdata');
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
            'usia_ayam' => 'required|max:20',
        ]);

        $user = Auth::user()->id;
        // $ayam = Pakan::all();
        // $jumlah = $ayam->jmlh_konsentrat;

        Kandang::create([
            'id_petugas' => $user,
            'usia_ayam' => $request->usia_ayam,
        ]);
            return redirect('kandang')->with('message', 'Data berhasil ditambahkan');
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
        $kandang = Kandang::findOrFail($id);

        return view('pages.kandang.editdata')->with('kandang', $kandang);
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
        $kandang = Kandang::find($id);
        $user = Auth::user()->id;
        $kandang->id_petugas = $user;
        $kandang->usia_ayam = $request->input('usia_ayam');;
        $kandang->update();

        return redirect('kandang')->with('message', 'Data berhasil diubah');
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
