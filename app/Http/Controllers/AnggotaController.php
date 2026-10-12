<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::orderBy('nama')->get();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis'   => 'required|unique:anggota,nis',
            'nama'  => 'required',
            'kelas' => 'required',
        ]);

        Anggota::create($request->only('nis', 'nama', 'kelas'));

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function destroy(Anggota $anggota)
    {

        if ($anggota->peminjaman()->exists()) {
            return redirect()->route('anggota.index')
                ->with('error', 'Anggota tidak bisa dihapus karena sudah memiliki riwayat peminjaman');
        }

        $anggota->delete();

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil dihapus');
    }
}
