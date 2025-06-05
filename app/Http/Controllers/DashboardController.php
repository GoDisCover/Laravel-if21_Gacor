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
        $kelasperprodi = DB::select("SELECT prodi.nama, jadwal.tahun_akademik, COUNT(kelas) as jumlah
            FROM jadwal
            JOIN matakuliah ON jadwal.mata_kuliah_id = matakuliah.id
            JOIN prodi ON matakuliah.prodi_id = prodi.id
            GROUP BY prodi.nama, jadwal.tahun_akademik
            Order By jadwal.tahun_akademik, prodi.nama
            ");
        return view('dashboard.index',compact('mahasiswaprodi','mahasiswasma','mahasiswatahun','kelasperprodi'));
    }
}
