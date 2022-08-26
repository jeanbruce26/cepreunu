<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $primaryKey = "id_carrera";

    protected $table = 'carrera';
    protected $fillable = [
        'id_carrera',
        'carrera'
    ];

    public $timestamps = false;
}
