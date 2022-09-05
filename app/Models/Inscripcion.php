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
        'sede',
        'turno',
        'id_proceso',
        'id_persona',
        'foto'
    ];

    public $timestamps = false;

    // SedeCarrera
    public function SedeCarrera(){
        return $this->belongsTo(SedeCarrera::class,
        'id_sede_carrera','id_sede_carrera');
    }

    // Proceso
    public function Proceso(){
        return $this->belongsTo(Proceso::class,
        'id_proceso','id_proceso');
    }

    // Persona
    public function Persona(){
        return $this->belongsTo(Persona::class,
        'id_persona','id_persona');
    }
}
