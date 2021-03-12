<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_temporada',
        'fecha_celebracion',
        'fecha_fin_inscripcion',
        'descripcion',
        'activo',
    ];

    protected $primaryKey = "id_control";
    protected $table = 'controles';
}
