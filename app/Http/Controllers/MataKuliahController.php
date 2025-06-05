<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mata_kuliah = Mata_Kuliah::all();
        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::all();
        return view('mata_kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);
        MataKuliah::create($input);
        return redirect()->route('mata_kuliah.index')->with('success', 'Matakuliah created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(mata_kuliah $mata_kuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mata_kuliah $mata_kuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mata_kuliah $mata_kuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mata_kuliah $mata_kuliah)
    {
        //
    }
}
