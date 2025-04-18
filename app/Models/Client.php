<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected  $fillable = [
        'namapl',
        'namapr',
        'alamat',
        'notelp',
        'email',
    ];

    protected $table = 'client';

    public function events(){
        return $this->hasMany(Events::class,'id_client');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id');
    }
}
