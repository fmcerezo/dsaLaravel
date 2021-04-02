<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'temporada_id_temporada',
        'fecha_celebracion',
        'fecha_fin_inscripcion',
        'descripcion',
        'activo',
    ];

    protected $primaryKey = "id_control";
    protected $table = 'controles';

    public function getFechaCelebracionFormateadaAttribute()
    {
        $fecha = new Carbon($this->fecha_celebracion);
        return $fecha->format('d/m/Y');
    }

    public function getFechaFinInscripcionFormateadaAttribute()
    {
        $fecha = new Carbon($this->fecha_fin_inscripcion);
        return $fecha->format('d/m/Y');
    }

    public function pruebas()
    {
        return $this->hasMany(PruebaControl::class);
    }

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
