<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with map
     */
    public function index()
    {
        // Get all tempat_makan with coordinates
        $tempatMakan = DB::table('tempat_makan')
            ->join('kategori', 'tempat_makan.kategori_id', '=', 'kategori.id')
            ->select(
                'tempat_makan.id',
                'tempat_makan.nama_tempat',
                'tempat_makan.alamat',
                'kategori.nama_kategori',
                DB::raw('ST_X(geom) as longitude'),
                DB::raw('ST_Y(geom) as latitude')
            )
            ->whereNotNull('geom')
            ->get();

        return view('dashboard', compact('tempatMakan'));
    }
}
