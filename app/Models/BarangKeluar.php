<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangKeluar extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $table = 'barangkeluar';
    protected $fillable = [
        'barang_id',
        'jumlah_keluar',
        'alasan',
        'tanggal_keluar',
    ];
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
