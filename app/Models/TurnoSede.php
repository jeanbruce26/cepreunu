<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TurnoSede extends Model
{
    use HasFactory;

    protected $primaryKey = "id_sede";

    protected $table = 'turno_sede';
    protected $fillable = [
        'id_turno_sede',
        'id_turno',
        'id_sede'
    ];

    public $timestamps = false;

    // Sede
    public function Sede(){
        return $this->belongsTo(Sede::class,
        'id_sede','id_sede');
    }

    // Turno
    public function Turno(){
        return $this->belongsTo(Turno::class,
        'id_turno','id_turno');
    }
}
