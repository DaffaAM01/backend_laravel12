<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasApiTokens,HasFactory,Notifiable;

    protected $table = 'transaksi';

    protected $fillable = [
        'pelanggan_id',
        'total_harga',
        'tanggal_beli'
    ];    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function details()
{
    return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
}
}
