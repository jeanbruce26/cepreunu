<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pago extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = "id_pago";
    // protected $dates = ['fecha_pago'];

    protected $dates = ['fecha_pago'];

    protected $table = 'pago';
    protected $fillable = [
        'id_pago', 
        'dni',
        'numero_operacion',
        'monto',
        'fecha_pago',
        'id_modalidad_pago',
        'estado',
        'id_inscripcion',
    ];

    public $timestamps = false;

    public function Inscripcion(){
        return $this->belongsTo(Inscripcion::class,
        'id_inscripcion','id_inscripcion');
    }

    public function ModalidadPago(){
        return $this->belongsTo(ModalidadPago::class,
        'id_modalidad_pago','id_modalidad_pago');
    }
}
