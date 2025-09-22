<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori'; // Nama tabel
    protected $primaryKey = 'id';  // Primary key

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_kategori',
    ];
}
