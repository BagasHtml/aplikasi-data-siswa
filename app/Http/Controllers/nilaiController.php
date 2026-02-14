<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = nilai::all();
        return view('nilai.nilai', compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "nama" => ['required'],
            "mata_pelajaran" => ['required'],
            "nilai" => ['required'],
            "rata_rata" => ['required'],
        ]);

        nilai::create($request->all());

        if ($validasi) {
            return redirect()->route('nilai')->with('success', 'data siswa berhasil ditambahkan');
        }

        return back()->withErrors('error', 'gagal menambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilai = nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama' => ['required'],
            'mata_pelajaran' => ['required'],
            'nilai' => ['required'],
            'rata_rata' => ['required'],
        ]);

        $validasi = nilai::findOrFail($id);
        $validasi->update($request->all());

        return redirect()->route('nilai')->with('success', 'nilai berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai = nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai')->with('success', 'nilai siswa berhasil dihapus');
    }
}
