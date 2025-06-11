<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Cloudinary\Api\Upload\UploadApi;
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
        'matakuliah_id' => 'required|integer',
        'dosenid' => 'required|integer',
        'pertemuan' => 'required|integer',
        'pokokbahasan' => 'required|string',
        'filemateri' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
    ]);

    if ($request->hasFile('filemateri')) {
        try {
            $file = $request->file('filemateri');
            $response = Http::asMultipart()->post(
                'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/raw/upload',
                [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'upload_preset',
                        'contents' => env('CLOUDINARY_UPLOAD_PRESET'),
                    ],
                ]
            );

            $result = $response->json();
            if (isset($result['secure_url'])) {
                $validated['filemateri'] = $result['secure_url'];
            } else {
                return back()->withErrors(['filemateri' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['filemateri' => 'Cloudinary error: ' . $e->getMessage()]);
        }
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
            'matakuliah_id' => 'required|integer',
            'dosenid' => 'required|integer',
            'pertemuan' => 'required|integer',
            'pokokbahasan' => 'required|string',
            'filemateri' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);
        if ($request->hasFile('filemateri')) {
        try {
            $file = $request->file('filemateri');
            $response = Http::asMultipart()->post(
                'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/raw/upload',
                [
                    [
                        'name'     => 'file',
                        'contents' => fopen($file->getRealPath(), 'r'),
                        'filename' => $file->getClientOriginalName(),
                    ],
                    [
                        'name'     => 'upload_preset',
                        'contents' => env('CLOUDINARY_UPLOAD_PRESET'),
                    ],
                ]
            );

            $result = $response->json();
            if (isset($result['secure_url'])) {
                $validated['filemateri'] = $result['secure_url'];
            } else {
                return back()->withErrors(['filemateri' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['filemateri' => 'Cloudinary error: ' . $e->getMessage()]);
        }
    }

        $materi->update($validated);

        return redirect()->route('materi.index')->with('success', 'Materi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
{
    if ($materi->cloudinary_public_id) {
        (new UploadApi())->destroy($materi->cloudinary_public_id);
    }

    $materi->delete();
    return redirect()->route('materi.index')->with('success', 'Materi deleted successfully.');
}
}