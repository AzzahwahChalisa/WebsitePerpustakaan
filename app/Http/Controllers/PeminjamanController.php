<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Daftar transaksi peminjaman
    public function index()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // Form pinjam buku: kirim daftar buku dan anggota untuk dropdown
    public function create()
    {
        $buku = Buku::orderBy('judul')->get();
        $anggota = Anggota::orderBy('nama')->get();
        return view('peminjaman.create', compact('buku', 'anggota'));
    }

    // Simpan transaksi peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'buku_id'        => 'required|exists:buku,id',
            'anggota_id'     => 'required|exists:anggota,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        Peminjaman::create([
            'buku_id'        => $request->buku_id,
            'anggota_id'     => $request->anggota_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status'         => 'dipinjam',
        ]);

        return redirect()->route('peminjaman.index')
                         ->with('success', 'Peminjaman berhasil disimpan');
    }
}
