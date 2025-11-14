<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = [
        'user_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function cekTerlambat()
    {
        // Cek tanggal kembali < hari ini
        if ($this->tanggal_kembali < now()->toDateString() && $this->status != 'dikembalikan') {

            // Update status jadi terlambat
            $this->status = 'terlambat';

            // Denda hanya sekali
            if ($this->denda == 0) {
                $this->denda = 35000;
            }

            $this->save();
        }
    }
}
