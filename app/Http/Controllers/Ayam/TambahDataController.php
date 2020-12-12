<?php

namespace App\Http\Controllers\Ayam;

use App\Ayam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TambahDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.ayam.tambahdata');
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
            'ayam_aktif' => 'required',
            'ayam_tidak_aktif' => 'required',
            'ayam_sakit' => 'required',
            'ayam_mati' => 'required',
        ]);

        $user = Auth::user()->id;

        Ayam::create([
            'id_petugas' => $user,
            'jmlh_ayam_aktif' => $request->ayam_aktif,
            'jmlh_ayam_tdk_aktif' => $request->ayam_tidak_aktif,
            'jmlh_ayam_sakit' => $request->ayam_sakit,
            'jmlh_ayam_mati' => $request->ayam_mati,
        ]);
            return redirect('ayam')->with('message', 'Data Berhasil Ditambahkan');
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
        $ayam = Ayam::findOrFail($id);

        return view('pages.ayam.editdata')->with('ayam', $ayam);
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
        $ayam = Ayam::find($id);
        $user = Auth::user()->id;
        $ayam->id_petugas = $user;
        $ayam->jmlh_ayam_aktif = $request->input('ayam_aktif');
        $ayam->jmlh_ayam_tdk_aktif = $request->input('ayam_tidak_aktif');
        $ayam->jmlh_ayam_sakit = $request->input('ayam_sakit');
        $ayam->jmlh_ayam_mati = $request->input('ayam_mati');
        $ayam->update();

        return redirect('ayam')->with('message', 'Data berhasil diubah');
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
