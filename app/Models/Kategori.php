<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
