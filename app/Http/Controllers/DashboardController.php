<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $mahasiswaprodi = DB::select('select prodi.nama, count(*) as jumlah from mahasiswas
        join prodi on mahasiswas.prodi_id = prodi.id
        group by prodi.nama');
        $mahasiswasma = DB::select('select asal_sma, count(*) as jumlah from mahasiswas
        group by asal_sma');
        $mahasiswatahun = DB::select('select substring(npm,1,2) as tahun, count(*) as jumlah from mahasiswas
        group by tahun');
        return view('dashboard.index',compact('mahasiswaprodi','mahasiswasma','mahasiswatahun'));
    }
}
