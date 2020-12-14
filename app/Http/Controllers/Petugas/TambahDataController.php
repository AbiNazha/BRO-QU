<?php

namespace App\Http\Controllers\Petugas;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TambahDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.petugas.tambahdata');
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
            'nama' => 'required|max:20',
            'username' => 'required|max:20|unique:datapetugas',
            'email' => 'required|unique:datapetugas',
            'alamat' => 'required|max:30',
            'no_hp' => 'required|max:15',
            'jabatan' => 'required',
        ]);


        User::create([
            'nama_petugas' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'password' => bcrypt($request->username),
        ]);
            return redirect('petugas')->with('message', 'Akun berhasil dibuat. Password diatur sesuai dengan Username');
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
        $users = User::findOrFail($id);

        return view('pages.petugas.editdata')->with('users', $users);
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
            'nama' => 'required|max:20',
            'username' => 'required|max:20|unique:datapetugas,username,'.$id,
            'email' => 'required|max:20|unique:datapetugas,email,'.$id,
            'alamat' => 'required|max:30',
            'no_hp' => 'required|max:15',
            'jabatan' => 'required',
        ]);

        $users = User::find($id);
        $users->nama_petugas = $request->input('nama');
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->alamat = $request->input('alamat');
        $users->no_hp = $request->input('no_hp');
        $users->jabatan = $request->input('jabatan');
        $users->update();

        return redirect('petugas')->with('message', 'Data berhasil diubah');
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
