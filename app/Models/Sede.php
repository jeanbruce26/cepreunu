<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $primaryKey = "id_sede";

    protected $table = 'sede';
    protected $fillable = [
        'id_sede',
        'sede',
        'id_tipo_convenio'
    ];

    public $timestamps = false;

    // TipoConvenio
    public function TipoConvenio(){
        return $this->belongsTo(TipoConvenio::class,
        'id_tipo_convenio','id_tipo_convenio');
    }
}
