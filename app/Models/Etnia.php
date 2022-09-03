<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
    use HasFactory;
    
    protected $primaryKey = "id_etnia";

    protected $table = 'etnia';
    protected $fillable = [
        'id_etnia',
        'etnia'
    ];

    public $timestamps = false;
}
