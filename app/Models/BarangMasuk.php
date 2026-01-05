<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangMasuk extends Model
{
    use HasFactory,HasApiTokens,Notifiable;
    protected $table = 'barangmasuk';
    protected $fillable = [
        'barang_id',
        'suplayer_id',
        'jumlah_masuk',
        'tanggal_masuk',
    ];
      public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    // Hubungan ke Suplayer
    public function suplayer()
    {
        return $this->belongsTo(Suplayer::class, 'suplayer_id');
    }
}
