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

        $in_konsentrat = DB::table('datapakan')
            ->where('status', '=', 'In')
            ->sum('jmlh_konsentrat');
        $out_konsentrat = DB::table('datapakan')
            ->where('status', '=', 'Out')
            ->sum('jmlh_konsentrat');

        $total_konsentrat = $in_konsentrat - $out_konsentrat;

        $in_jagung = DB::table('datapakan')
            ->where('status', '=', 'In')
            ->sum('jmlh_jagung');
        $out_jagung = DB::table('datapakan')
            ->where('status', '=', 'Out')
            ->sum('jmlh_jagung');

        $total_jagung = $in_jagung - $out_jagung;

        $in_dedek = DB::table('datapakan')
            ->where('status', '=', 'In')
            ->sum('jmlh_dedek');
        $out_dedek = DB::table('datapakan')
            ->where('status', '=', 'Out')
            ->sum('jmlh_dedek');

        $total_dedek = $in_dedek - $out_dedek;
    
        return view('pages.pakan.pakan', ['pakan' => $pakan, 'konsentrat' => $total_konsentrat, 'jagung' => $total_jagung, 'dedek' => $total_dedek]);

        return view('pages.pakan.pakan');
    }
}
