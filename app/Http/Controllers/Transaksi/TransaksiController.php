<?php

namespace App\Http\Controllers\Transaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $petugas = DB::table('datapetugas')->get();
    
        return view('pages.transaksi.transaksi', ['petugas' => $petugas]);

        return view('pages.transaksi.transaksi');
    }
}
