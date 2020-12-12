<?php

namespace App\Http\Controllers\Pakan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pakan;
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
        return view('pages.pakan.tambahdata');
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
            'konsentrat' => 'required',
            'jagung' => 'required',
            'dedek' => 'required',
            'ayam' => 'required',
            'usia_ayam' => 'required',
            'status' => 'required',
        ]);

        $user = Auth::user()->id;

        Pakan::create([
            'id_petugas' => $user,
            'jmlh_konsentrat' => $request->konsentrat,
            'jmlh_jagung' => $request->jagung,
            'jmlh_dedek' => $request->dedek,
            'jmlh_ayam' => $request->ayam,
            'usia_ayam' => $request->usia_ayam,
            'status' => $request->status,
        ]);
            return redirect('pakan')->with('message', 'Data Berhasil Ditambahkan');
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
        $pakan = Pakan::findOrFail($id);

        return view('pages.pakan.editdata')->with('pakan', $pakan);
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
        $pakan = Pakan::find($id);
        $user = Auth::user()->id;
        $pakan->id_petugas = $user;
        $pakan->jmlh_konsentrat = $request->input('konsentrat');
        $pakan->jmlh_jagung = $request->input('jagung');
        $pakan->jmlh_dedek = $request->input('dedek');
        $pakan->jmlh_ayam = $request->input('ayam');
        $pakan->usia_ayam = $request->input('usia_ayam');
        $pakan->status = $request->input('status');
        $pakan->update();

        return redirect('pakan')->with('message', 'Data berhasil diubah');
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
