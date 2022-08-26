<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    use HasFactory;

    protected $primaryKey = "id_discapacidad";

    protected $table = 'discapacidad';
    protected $fillable = [
        'id_discapacidad',
        'discapacidad'
    ];

    public $timestamps = false;
}
