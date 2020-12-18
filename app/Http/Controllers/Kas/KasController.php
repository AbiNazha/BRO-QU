<?php

namespace App\Http\Controllers\Kas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KasController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $saldo = DB::table('datakas')
                ->select(DB::raw('tanggal, sum(total_pemasukan) as pemasukan, sum(nominal) as pengeluaran'))
                ->where('status', '=', 'Disetujui')
                ->groupBy('tanggal')
                ->get();

        // dd($saldo);
    
        return view('pages.kas.saldo', ['saldo' => $saldo]);
    }

    public function pemasukan()
    {
        $pemasukan = DB::table('datakas')
                    ->where('total_pemasukan', '!=', 0)
                    ->get();
    
        return view('pages.kas.pemasukan', ['pemasukan' => $pemasukan]);
    }

    public function pengeluaran()
    {
        $pengeluaran = DB::table('datakas')
                    ->where('nominal', '!=', 0)
                    ->get();
    
        return view('pages.kas.pengeluaran', ['pengeluaran' => $pengeluaran]);
    }
}
