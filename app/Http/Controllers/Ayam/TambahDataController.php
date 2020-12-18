<?php

namespace App\Http\Controllers\Ayam;

use App\Ayam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kandang;
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
        $kandang = Kandang::all();
        return view('pages.ayam.tambahdata', compact('kandang'));
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
            'id_kandang' => 'required|unique:dataayam,id_kandang',
            'ayam_produktif' => 'required|min:0|gte:0',
            'ayam_tidak_produktif' => 'required|min:0|gte:0',
            'ayam_belum_produktif' => 'required|min:0|gte:0',
            'ayam_sakit' => 'required|min:0|gte:0',
            'ayam_mati' => 'required|min:0|gte:0',
        ]);

        $user = Auth::user()->id;

        Ayam::create([
            'id_petugas' => $user,
            'id_kandang' => $request->id_kandang,
            'jmlh_ayam_produktif' => $request->ayam_produktif,
            'jmlh_ayam_belum_produktif' => $request->ayam_belum_produktif,
            'jmlh_ayam_tidak_produktif' => $request->ayam_tidak_produktif,
            'jmlh_ayam_sakit' => $request->ayam_sakit,
            'jmlh_ayam_mati'=> $request->ayam_mati,
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
        $kandang = Kandang::all();

        return view('pages.ayam.editdata', compact('kandang'))->with('ayam', $ayam);
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
            'id_kandang' => 'required|unique:dataayam,id_kandang,'.$id,
            'ayam_produktif' => 'required|min:0|gte:0',
            'ayam_tidak_produktif' => 'required|min:0|gte:0',
            'ayam_belum_produktif' => 'required|min:0|gte:0',
            'ayam_sakit' => 'required|min:0|gte:0',
            'ayam_mati' => 'required|min:0|gte:0',
        ]);

        $ayam = Ayam::find($id);
        $user = Auth::user()->id;
        $ayam->id_petugas = $user;
        $ayam->id_kandang = $request->input('id_kandang');
        $ayam->jmlh_ayam_produktif = $request->input('ayam_produktif');
        $ayam->jmlh_ayam_belum_produktif = $request->input('ayam_belum_produktif');
        $ayam->jmlh_ayam_tidak_produktif = $request->input('ayam_tidak_produktif');
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
