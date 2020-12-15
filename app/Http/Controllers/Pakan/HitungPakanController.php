<?php

namespace App\Http\Controllers\Pakan;

use App\Ayam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kandang;
use DB;

class HitungPakanController extends Controller
{
    public function index(){
        $kandang = Kandang::all();
        return view('pages.pakan.hitungpakan', compact('kandang'));
    }

    public function hitungpakan(Request $request){
        $pakan = Kandang::where('id', '=', $request->id_kandang)
                ->get();
        $ayam = Ayam::where('id_kandang', '=', $request->id_kandang)
                ->get();
        
        $total = 0;
        foreach ($pakan as $paka) {
            $usia = $paka->usia_ayam;
        }
        foreach ($ayam as $ayams) {
            $total = $ayams->jmlh_ayam_produktif + $ayams->jmlh_ayam_belum_produktif + $ayams->jmlh_ayam_tidak_produktif + $ayams->jmlh_ayam_sakit;
        }

        $jumlah = 0;
        if ($usia == 1) {
            $jumlah = 11 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 2) {
           $jumlah = 17 * $total / 1000;
           $dedek = $jumlah * 15/100 ;
           $jagung = $jumlah * 50/100;
           $konsentrat = $jumlah * 35/100;
        } elseif($usia == 3) {
            $jumlah = 22 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 4) {
            $jumlah = 28 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 5) {
            $jumlah = 35 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 6) {
            $jumlah = 41 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 7) {
            $jumlah = 47 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 8) {
            $jumlah = 51 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 9) {
            $jumlah = 55 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 10) {
            $jumlah = 58 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 11) {
            $jumlah = 60 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 12) {
            $jumlah = 64 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;
        } elseif($usia == 13) {
            $jumlah = 65 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 14) {
            $jumlah = 68 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 15) {
            $jumlah = 70 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 16) {
            $jumlah = 71 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 17) {
            $jumlah = 72 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 18) {
            $jumlah = 75 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 19) {
            $jumlah = 81 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia == 20) {
            $jumlah = 93 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        } elseif($usia > 20) {
            $jumlah = 110 * $total / 1000;
            $dedek = $jumlah * 15/100 ;
            $jagung = $jumlah * 50/100;
            $konsentrat = $jumlah * 35/100;;
        }
        
        // $hitung = $pakan->usia_ayam;
        return redirect()->back()
                    ->with('dedek', $dedek)
                    ->with('jagung', $jagung)
                    ->with('konsentrat', $konsentrat);
        
    }

}
