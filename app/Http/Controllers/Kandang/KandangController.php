<?php

namespace App\Http\Controllers\Kandang;

use App\Ayam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KandangController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kandang = DB::table('datakandang')
                ->leftjoin('dataayam', 'dataayam.id_kandang', '=', 'datakandang.id')
                ->select('datakandang.*', DB::raw('dataayam.id as id_ayam, dataayam.tanggal as tanggal_ayam, dataayam.jmlh_ayam_produktif + dataayam.jmlh_ayam_belum_produktif + dataayam.jmlh_ayam_tidak_produktif + dataayam.jmlh_ayam_sakit - dataayam.jmlh_ayam_mati as total'))
                ->get();

        return view('pages.kandang.kandang', ['kandang' => $kandang]);
    
        return view('pages.kandang.kandang');
    }

}
