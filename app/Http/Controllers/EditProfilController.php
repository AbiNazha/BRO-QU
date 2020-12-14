<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class EditProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.editprofil')->with('users', Auth::user());
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
        $request->validate([
            'password' => $request->password_baru != null ? new MatchOldPassword: '',
            'password_baru' => 'sometimes',
            'konfirmasi_password' => 'sometimes|same:password_baru',
            'nama' => 'required|max:20',
            'username' => 'required|max:20|unique:datapetugas,username,'.Auth::id(),
            'email' => 'required|max:20|unique:datapetugas,email,'.Auth::id(),
            'alamat' => 'required|max:30',
            'no_hp' => 'required|max:15',
        ]);
        

        $users = User::find(auth()->user()->id);
        $pass = Auth::user()->getAuthPassword();
        $users->nama_petugas = $request->input('nama');
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->alamat = $request->input('alamat');
        $users->no_hp = $request->input('no_hp');
        $users->password = $request->password_baru != null ? Hash::make($request->input('password_baru')) : $pass;
        $users->update();

        return redirect('editprofile')->with('message', 'Data berhasil diubah');
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
        // $users = User::findOrFail($id);

        // return view('pages.editprofil')->with('users', $users);
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
