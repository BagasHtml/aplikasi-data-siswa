<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi; // sesuaikan model kamu

class AbsensiController extends Controller
{
    /**
     * Daftar kelas tersedia — satu tempat untuk semua perubahan.
     * Scalable: tinggal tambah item di sini kalau ada kelas baru.
     */
    private const KELAS_LIST = [
        'RPL 1',
        'RPL 2',
        'RPL 3',
        'RPL 4',
        'RPL 5',
    ];

    public function index(Request $request)
    {
        $kelasFilter = $request->query('kelas');

        $absensi = Absensi::query()
            ->when($kelasFilter, fn ($q) => $q->where('kelas', $kelasFilter))
            ->get();

        return view('absensi.absensi', [
            'absensi'   => $absensi,
            'kelasList' => self::KELAS_LIST,
        ]);
    }

    public function proses(Request $request)
    {
        $data = $request->input('absensi');

        if (!$data) {
            return back()->with('success', 'Tidak ada data yang perlu disimpan.');
        }

        foreach ($data as $id => $item) {
            Absensi::where('id', $id)->update([
                'waktu_kehadiran'   => $item['waktu'],
                'tanggal_kehadiran' => $item['tanggal'],
            ]);
        }

        return back()->with('success', 'Absensi berhasil disimpan!');
    }
}
