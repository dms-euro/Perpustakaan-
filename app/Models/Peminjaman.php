<?php

namespace App\Models;

use Carbon\Carbon;
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
        if ($this->status == 'meminjam') {
            $hariIni = Carbon::now()->startOfDay();
            $jatuhTempo = Carbon::parse($this->tanggal_kembali);

            if ($hariIni->gt($jatuhTempo)) {
                $this->status = 'terlambat';
                $this->denda = 50000;
                $this->save();
            }
        }
    }
}
