<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoConvenio extends Model
{
    use HasFactory;

    protected $primaryKey = "id_tipo_convenio";

    protected $table = 'tipo_convenio';
    protected $fillable = [
        'id_tipo_convenio',
        'tipo_convenio'
    ];

    public $timestamps = false;
}
