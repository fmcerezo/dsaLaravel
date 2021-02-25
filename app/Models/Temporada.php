<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ano_inicio_temporada',
        'ano_fin_temporada',
    ];

    protected $primaryKey = "id_temporada";
}
