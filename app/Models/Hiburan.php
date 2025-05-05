<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiburan extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_hiburan',
        'deskripsi',
        'harga',
    ];

    protected $table = 'hiburan';

    public function paket(){
        return $this->hasMany(Paket::class, 'id');
    }
}
