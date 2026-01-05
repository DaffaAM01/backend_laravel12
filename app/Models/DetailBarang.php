<?php

namespace App\Models;

use App\Models\Kategori;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailBarang extends Model
{
    use HasFactory,HasApiTokens,Notifiable;
    protected $table = 'detailbarang';

    protected $fillable = [
        'barang_id',
        'deskripsi',
        'kategori_id',
        'harga_jual',
    ];
    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
