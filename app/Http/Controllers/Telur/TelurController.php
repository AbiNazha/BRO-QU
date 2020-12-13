<?php

namespace App\Http\Controllers\Telur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Telur;
use DB;

class TelurController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
       $telur = DB::table('datatelur')->get();

       $total = 0;
       foreach ($telur as $d => $data){
            $total += $data->stok_telur - ($data->jmlh_telurjual + $data->jmlh_telurrusak);
       }

       return view('pages.telur.telur', ['telur' => $telur, 'total'=> $total]);

       return view('pages.telur.telur');
   }
}
