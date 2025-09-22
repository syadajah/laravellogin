<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Dashboard: kirim $data_buku ke view "admin"
    public function index()
    {
        // pilih salah satu: paginate atau all()
        $x['data_buku'] = BukuModel::latest()->paginate(10);
        return view('admin', $x);
    }

    // Tampilkan form input buku
    public function create()
    {
        return view('admin.input-data');
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_buku' => 'required|string|max:50',
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4',
            'kategori_id'=> 'required|exists:kategori,id',
            'cover_buku' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload cover
        $coverPath = null;
        if ($request->hasFile('cover_buku')) {
            $coverPath = $request->file('cover_buku')->store('covers', 'public');
        }

        BukuModel::create([
            'kode_buku' => $validated['kode_buku'],
            'judul_buku' => $validated['judul_buku'],
            'penerbit' => $validated['penerbit'],
            'pengarang' => $validated['pengarang'],
            'tahun_terbit' => $validated['tahun_terbit'],
            'kategori_id' => $validated['kategori_id'],
            'cover_buku' => $coverPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Buku berhasil ditambahkan!');
    }
}