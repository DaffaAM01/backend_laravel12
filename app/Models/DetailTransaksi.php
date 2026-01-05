<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksi extends Model
{
     use HasApiTokens,HasFactory,Notifiable;

    protected $table = 'detailtransaksi';
    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'qty',
        'harga_barang',
        'subtotal',
        'jumlah_bayar',
        'kembalian',
    ];
public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
