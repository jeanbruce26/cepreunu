<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeCarrera extends Model
{
    use HasFactory;

    protected $primaryKey = "id_sede_carrera";

    protected $table = 'sede_carrera';
    protected $fillable = [
        'id_sede_carrera',
        'id_sede',
        'id_carrera',
        'id_modalidad'
    ];

    public $timestamps = false;

    // Sede
    public function Sede(){
        return $this->belongsTo(Sede::class,
        'id_sede','id_sede');
    }
    // Carrera
    public function Carrera(){
        return $this->belongsTo(Carrera::class,
        'id_carrera','id_carrera');
    }
    // Modalidad
    public function Modalidad(){
        return $this->belongsTo(Modalidad::class,
        'id_modalidad','id_modalidad');
    }
}
