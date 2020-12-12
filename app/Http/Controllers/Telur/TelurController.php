<?php

namespace App\Http\Controllers\Telur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
   
       return view('pages.telur.telur', ['telur' => $telur]);

       return view('pages.telur.telur');
   }
}
