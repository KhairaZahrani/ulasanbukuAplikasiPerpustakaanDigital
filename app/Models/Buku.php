<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'id_kategori',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'deskripsi'
    ];

    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
}

}
