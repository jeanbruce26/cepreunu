<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    use HasFactory;

    protected $primaryKey = "id_egreso";

    protected $table = 'egreso';
    protected $fillable = [
        'id_egreso',
        'egreso'
    ];

    public $timestamps = false;
}
