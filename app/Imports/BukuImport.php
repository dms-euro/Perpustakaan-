<?php

namespace App\Imports;

use App\Models\Buku;
use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BukuImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Ambil atau buat kategori berdasarkan nama
        $kategori = Kategori::firstOrCreate([
            'kategori' => $row['kategori'] ?? 'Umum' // default jika kosong
        ]);

        return new Buku([
            'judul'      => $row['judul'],
            'penulis'    => $row['penulis'],
            'penerbit'   => $row['penerbit'],
            'kategori_id'=> $kategori->id,
            'isbn'       => $row['isbn'] ?? null,
        ]);
    }
}
