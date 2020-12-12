<?php

namespace App\Http\Controllers\Telur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Telur;
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
        return view('pages.telur.tambahdata');
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
            'telur_terjual' => 'required',
            'telur_rusak' => 'required',
        ]);

        $user = Auth::user()->id;

        Telur::create([
            'id_petugas' => $user,
            'jmlh_telurjual' => $request->telur_terjual,
            'jmlh_telurrusak' => $request->telur_rusak,
        ]);
            return redirect('telur/tambahdata')->with('message', 'Data Berhasil Ditambahkan');
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
        $telur = Telur::findOrFail($id);

        return view('pages.telur.editdata')->with('telur', $telur);
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
        $telur = Telur::find($id);
        $user = Auth::user()->id;
        $telur->id_petugas = $user;
        $telur->jmlh_telurjual = $request->input('telur_terjual');
        $telur->jmlh_telurrusak = $request->input('telur_rusak');
        $telur->update();

        return redirect('telur')->with('message', 'Data berhasil diubah');
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
