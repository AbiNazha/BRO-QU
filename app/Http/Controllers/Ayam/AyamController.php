<?php

namespace App\Http\Controllers\Ayam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AyamController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ayam = DB::table('dataayam')->get();
    
        return view('pages.ayam.ayam', ['ayam' => $ayam]);

        return view('pages.ayam.ayam');
    }

}
