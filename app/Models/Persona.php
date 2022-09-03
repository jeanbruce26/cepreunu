<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = "id_persona";

    protected $dates = ['fecha_nacimiento'];

    protected $table = 'persona';
    protected $fillable = [
        'id_persona',
        'numero_documento',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'direccion',
        'celular',
        'sexo',
        'fecha_nacimiento',
        'email',
        'año_egreso',
        'especialidad',
        'pais_extra',
        'nombre_apoderado',
        'celular_apoderado',
        'id_ubigeo',
        'id_tipo_documento',
        'id_discapacidad',
        'id_estado_civil',
        'id_lengua_materna',
        'id_modular',
        'id_egreso',
        'id_etnia',
    ];

    public $timestamps = false;

    // Ubigeo
    public function Ubigeo(){
        return $this->belongsTo(Ubigeo::class,
        'id_ubigeo','id_ubigeo');
    }

    // TipoDocumento
    public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::class,
        'id_tipo_documento','id_tipo_documento');
    }

    // Discapacidad
    public function Discapacidad(){
        return $this->belongsTo(Discapacidad::class,
        'id_discapacidad','id_discapacidad');
    }

    // EstadoCivil
    public function EstadoCivil(){
        return $this->belongsTo(EstadoCivil::class,
        'id_estado_civil','id_estado_civil');
    }

    // LenguaMaterna
    public function LenguaMaterna(){
        return $this->belongsTo(LenguaMaterna::class,
        'id_lengua_materna','id_lengua_materna');
    }

    // Modular
    public function Modular(){
        return $this->belongsTo(Modular::class,
        'id_modular','id_modular');
    }

    // Egreso
    public function Egreso(){
        return $this->belongsTo(Egreso::class,
        'id_egreso','id_egreso');
    }
}
