<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // akses model Fakultas
        $fakultas = Fakultas::all();  // select * from fakultas
        // dd($fakultas);
        return view('fakultas.index')->with('fakultas', $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input form
        $input = $request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required',
            'nama_dekan' => 'required',
            'nama_wadek' => 'required'
        ]);

        // simpan ke tabel fakultas
        Fakultas::create($input);

        // redirect ke route fakultas.index
        return redirect()->route('fakultas.index')
                         ->with('success', 'Fakultas berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakultas);
        return view('fakultas.edit', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakultas);
        // validasi input form
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required',
            'nama_dekan' => 'required',
            'nama_wadek' => 'required'
        ]);

        // ubah data fakultas
        $fakultas->update($input);

        // redirect ke route fakultas.index
        return redirect()->route('fakultas.index')
                         ->with('success', 'Fakultas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakultas);
        
        // hapus data fakultas
        $fakultas->delete();

        // redirect ke route fakultas.index
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil di hapus.');
    }
}
