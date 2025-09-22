<?php

namespace App\Models;

use App\Http\Controllers\KategoriController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = 'data_buku';
    protected $fillable = ['kode_buku', 'judul_buku', 'penerbit', 'pengarang', 'tahun_terbit', 'kategori_id', 'cover_buku'];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }
}
