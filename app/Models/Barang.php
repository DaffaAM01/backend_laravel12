<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use  HasApiTokens,HasFactory,Notifiable;
    protected $table = 'barang';
//     protected $casts = [
//     'image' => 'json',
// ];
    protected $fillable = [
    'image',
    'nama_barang',
    'harga_barang',
    'qty',
    
];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'barang_id');
    }
}
