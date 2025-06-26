<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'penyewa_id',
        'jumlah',
        'tanggal_bayar',
        'jatuh_tempo',
        'status',
        'nomor_kamar',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jatuh_tempo' => 'date',
    ];

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class);
    }
}
