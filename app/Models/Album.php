<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_album',
        'deskripsi',
        'harga',
    ];

    protected $table = 'album';

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id');
    }
    public function paket(){
        return $this->hasMany(Paket::class, 'id');
    }
}
