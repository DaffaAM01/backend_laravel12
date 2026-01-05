<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suplayer extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $table ='suplayer';
    protected $fillable = [
        'nama_suplayer',
        'nama_perusahaan',
        'alamat',
        'noHP',
    ];
    public function stockMasuk()
    {
        return $this->hasMany(StockMasuk::class, 'suplayer_id');
    }
}
