<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::select('id', 'nama', 'kelas', 'waktu_kehadiran', 'tanggal_kehadiran')->paginate(32);
        return view('absensi.absensi', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $absensi = $request->validate([
            'simpan' => ['required'],
        ]);

        $absensi = Absensi::create($request->select('id', 'nama', 'kelas', 'waktu_kehadiran', 'tanggal_kehadiran')->paginate(30));

        if ($absensi) {
            return redirect()->route('absensi')->with('success', 'berhasil disimpan');
        } else {
            return back()->withErrors('error', 'gagal menyimpan data siswa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
