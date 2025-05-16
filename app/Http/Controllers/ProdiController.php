<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all(); // SELECT * from prodi
        return view('prodi.index', compact('prodi'))->with('prodi',$prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fakultas = Fakultas::all();
        return view('prodi.create',compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'nama'=> 'required|unique:prodi',
            'singakatan'=> 'required',
            'Kaprodi'=> 'required',
            'Sekretaris'=> 'required',
            'fakultas_id'=> 'required|exists:fakultas,id',
        ]);
        Prodi::create($input);
        return redirect()->route('prodi.index')->with('Success','Prodi berhasil disimpan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
