<?php

namespace App\Http\Controllers\Pakan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PakanController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pakan = DB::table('datapakan')->get();
    
        return view('pages.pakan.pakan', ['pakan' => $pakan]);

        return view('pages.pakan.pakan');
    }
}
