<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $petugas = DB::table('datapetugas')->get();
    
        return view('pages.petugas.petugas', ['petugas' => $petugas]);

        return view('pages.petugas.petugas');
    }

}
