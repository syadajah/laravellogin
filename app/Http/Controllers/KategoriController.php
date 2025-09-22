<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function kategori()
    {
        $kategori = KategoriModel::all();
        return view('kategori', compact('kategori'));
    }
    public function postKategori()
    {
        $kategori = KategoriModel::all();
        return view('admin', compact('kategori'));
    }

    // Form tambah kategori
    public function create()
    {
        return view('kategori.create');
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        KategoriModel::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan!');
    }
}
