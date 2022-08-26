<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modular extends Model
{
    use HasFactory;

    protected $primaryKey = "id_modular";

    protected $table = 'modular';
    protected $fillable = [
        'id_modular',
        'departamento',
        'provincia',
        'distrito',
        'gestion',
        'codigo_modular',
        'colegio'
    ];

    public $timestamps = false;
}
