<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use  HasApiTokens,HasFactory,Notifiable;
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'noHP',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pelanggan_id');
    }
}
