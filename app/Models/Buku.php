<?php

namespace App\Models;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use Searchable;
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'penulis',
        'isbn',
        'kategori_id',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
