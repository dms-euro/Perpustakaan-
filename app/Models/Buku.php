<?php

namespace App\Models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use Searchable;

    protected $table = 'buku';
    protected $fillable = [
        'kategori_id', 'judul', 'penulis', 'penerbit', 'isbn', 'cover'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class);
    }
}
