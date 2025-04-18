<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_catering',
        'deskripsi',
        'porsi',
        'harga',
    ];

    protected $table = 'catering';

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id');
    }
}
