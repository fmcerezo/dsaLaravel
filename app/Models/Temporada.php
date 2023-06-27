<?php

namespace App\Models;

class Temporada extends ImageModel
{
    protected $fillable = [
        'ano_inicio_temporada',
        'ano_fin_temporada',
    ];

    protected $primaryKey = "id_temporada";

    /*    
    Antes de eliminar la temporada se eliminan las imágenes asociadas,
    para evitar el error de integridad referencial.
    */
    public static function boot() {
        parent::boot();

        static::deleting(function($temporada) {
            $temporada->imagenes()->delete();
        });
    }

    public function controles() {
        return $this->hasMany(Control::class);
    }

    public function getDescripcionAttribute() {
        return $this->ano_inicio_temporada . '/' . $this->ano_fin_temporada;
    }
}
