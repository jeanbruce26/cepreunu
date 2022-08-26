<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $primaryKey = "id_proceso";

    protected $table = 'proceso';
    protected $fillable = [
        'id_proceso',
        'año',
        'numero_proceso',
        'estado'
    ];

    public $timestamps = false;
}
