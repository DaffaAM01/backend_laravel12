<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataToko extends Model
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $table = 'datatoko';
    protected $fillable = [
        'nama_toko',
        'alamat_toko',
        'noHP_toko',
        'pesan_footer',
    ];
}
