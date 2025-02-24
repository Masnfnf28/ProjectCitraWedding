<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
        'tgl_acara',
        'lokasi'
    ];

    protected $table = 'events';


    public function client(){
        return $this->belongsTo(Client::class, 'id_client','id');
    }

}
