<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            "nama" => ["required"],
            "umur" => ["required"],
            "alamat" => ["required"],
            "kelas" => ['required']
        ]);

        $credentials = Siswa::create($request->all());

        if ($credentials) {
            return redirect()->route("siswa")->with("sukses menambahkan data siswa!");
        } else {
            return redirect()->route("siswa")->withErrors("error!, sepertinya ada data yang salah!");
        }
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
        $siswa = Siswa::findOrFail($id);
        return view("edit", compact("siswa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => ['required'],
            'umur' => ['required'],
            'alamat' => ['required'],
            'kelas' => ['required'],
        ]);

        $validate = Siswa::findOrFail($id);
        $validate->update($request->all());

        return redirect()->route('siswa')->with("berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route("siswa")->with("success menghapus data siswa!");
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'))->with('success', 'berhasil logout');
    }
}
