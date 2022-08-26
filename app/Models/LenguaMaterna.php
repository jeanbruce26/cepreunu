<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenguaMaterna extends Model
{
    use HasFactory;

    protected $primaryKey = "id_lengua_materna";

    protected $table = 'lengua_materna';
    protected $fillable = [
        'id_lengua_materna',
        'lengua_materna'
    ];

    public $timestamps = false;
}
