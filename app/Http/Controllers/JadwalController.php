<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Sesi;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $matakuliah = MataKuliah::all();
        $users = User::all();
        $sesi = Sesi::all();
        return view('jadwal.create', compact('matakuliah','users','sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'dosenid' => 'required',
            'sesi_id' => 'required',
        ]);
        Jadwal::create($input);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jadwal $jadwal)
    {
        //
        $matakuliah = MataKuliah::all();
        $users = User::all();
        $sesi = Sesi::all();
    return view('jadwal.edit', compact('jadwal', 'matakuliah', 'users', 'sesi'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $input = $request->validate([
        'tahun_akademik' => 'required',
        'kode_smt' => 'required',
        'kelas' => 'required',
        'mata_kuliah_id' => 'required',
        'dosenid' => 'required',
        'sesi_id' => 'required',
    ]);
    $jadwal = Jadwal::findOrFail($id);
    $jadwal->update($input);
    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
    $jadwal->delete();
    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');    }
}
