<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $primaryKey = "id_inscripcion";

    protected $table = 'inscripcion';
    protected $fillable = [
        'id_inscripcion',
        'estado',
        'id_sede_carrera',
        'turno',
        'id_proceso',
        'id_persona',
        'foto'
    ];

    public $timestamps = false;

    // SedeCarrera

    // Proceso

    // persona

}
