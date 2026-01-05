<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $table = 'service';
    protected $fillable = [
        'pelanggan_id',
        'barang_id',
        'keluhan',
        'biaya_service',
        'status',
    ];
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
