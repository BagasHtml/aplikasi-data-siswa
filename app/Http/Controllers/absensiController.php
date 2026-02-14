<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        return view('absensi.absensi', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $absensi = $request->input('absensi');

        if ($absensi) {
            foreach ($absensi as $id => $kolom) {
                Absensi::where('id', $id)->update([
                    'waktu_kehadiran' => $kolom['waktu'],
                    'tanggal_kehadiran' => $kolom['tanggal'],
                ]);
            }

            return redirect()->route('absensi')->with('success', 'absensi kehadiran siswa berhasil diinput!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
