<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wardrobe extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_wardrobe',
        'deskripsi',
        'harga',
    ];

    protected $table = 'wardrobe';

    public function paket(){
        return $this->hasMany(Paket::class, 'id');
    }
    

}
