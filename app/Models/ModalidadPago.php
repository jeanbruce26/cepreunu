<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalidadPago extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id_modalidad_pago";

    protected $table = 'modalidad_pago';
    protected $fillable = [
        'id_modalidad_pago', 
        'modalidad_pago',
        'estado',
    ];

    public $timestamps = false;
}
