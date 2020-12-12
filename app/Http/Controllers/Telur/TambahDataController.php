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
        // $this->validate($request, [
        //     'telur_terjual' => 'required',
        //     'telur_rusak' => 'required',
        //     'stok_telur' => 'required'|'greater_than_field:initial_page',
        // ]);

        $user = Auth::user()->id;
        $telur = Telur::all();
        $test = 0;
        foreach ($telur as $data) {
            $test += $data->stok_telur - ($data->jmlh_telurjual + $data->jmlh_telurrusak);
        }
        if($test == 0 ){
            $q = $request->telur_terjual + $request->telur_rusak;
            $this->validate($request, [
                'telur_terjual' => 'required',
                'telur_rusak' => 'required',
                'stok_telur' => 'required|gte:'.(int)$q,
            ]);

            Telur::create([
                'id_petugas' => $user,
                'jmlh_telurjual' => $request->telur_terjual,
                'jmlh_telurrusak' => $request->telur_rusak,
                'stok_telur' => $request->stok_telur,
            ]);
            return redirect('telur')->with('message', 'Data Berhasil Ditambahkan');
        }elseif($test < 0){
            return redirect('telur')->with('message', 'EROR');


        }elseif($test > 0){
            $this->validate($request, [
                'telur_terjual' => 'required',
                'telur_rusak' => 'required',
                'stok_telur' => 'required',
            ]);

            Telur::create([
                'id_petugas' => $user,
                'jmlh_telurjual' => $request->telur_terjual,
                'jmlh_telurrusak' => $request->telur_rusak,
                'stok_telur' => $request->stok_telur,
            ]);
            return redirect('telur')->with('message', 'Data Berhasil Ditambahkan');
        }

        
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
        $telur->stok_telur = $request->input('stok_telur');
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
