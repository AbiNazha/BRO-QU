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
        $transaksi = DB::table('transaksipenjualan')->get();
    
        return view('pages.transaksi.transaksi', ['transaksi' => $transaksi]);

        return view('pages.transaksi.transaksi');
    }
}
