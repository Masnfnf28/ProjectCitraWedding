<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makeup extends Model
{
    use HasFactory;

    protected  $fillable = [
        'type_makeup',
        'description',
        'harga',
    ];

    protected $table = 'makeup';
}
