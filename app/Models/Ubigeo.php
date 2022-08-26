<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;

    protected $primaryKey = "ubigeo";

    protected $table = 'ubigeo';
    protected $fillable = [
        'ubigeo',
        'distrito',
        'provincia',
        'departamento'
    ];

    public $timestamps = false;
}
