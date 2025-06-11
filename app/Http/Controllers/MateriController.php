<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::all();
        return view('materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matakuliah = MataKuliah::all();
        $users = User::all();
        return view('materi.create', compact('matakuliah','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'mata_kuliah_id' => 'required|integer',
        'dosenid' => 'required|integer',
        'pertemuan' => 'required|integer',
        'pokokbahasan' => 'required|string',
        'filemateri' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
    ]);

    if ($request->hasFile('filemateri')) {
        $file = $request->file('filemateri');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('file', $filename);
        $validated['filemateri'] = $filename;
    }

        Materi::create($validated);

        return redirect()->route('materi.index')->with('success', 'Materi created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(materi $materi)
    {
        return view('materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(materi $materi)
    {
        $matakuliah = MataKuliah::all();
        $users = User::all();
        return view('materi.edit', compact('materi', 'matakuliah', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, materi $materi)
    {
        $validated = $request->validate([
            'mata_kuliah_id' => 'required|integer',
            'dosenid' => 'required|integer',
            'pertemuan' => 'required|integer',
            'pokokbahasan' => 'required|string',
            'filemateri' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);
        if ($request->hasFile('filemateri')) {
             $file = $request->file('filemateri');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('file', $filename);
        $validated['filemateri'] = $filename;
}

        $materi->update($validated);

        return redirect()->route('materi.index')->with('success', 'Materi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(materi $materi)
    {
       Storage::delete('file/' . $materi->filemateri); // hapus file dari storage
        $materi->delete();
        return redirect()->route('materi.index')->with('success', 'Materi deleted successfully.');

    }
}