<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PruebaControl extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'control_id_control',
        'prueba_id_prueba',
        'categoria_id_categoria',
        'sexo',
        'hora',
    ];

    protected $primaryKey = "id_prueba_control";
    protected $table = 'pruebas_control';
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function control()
    {
        return $this->belongsTo(Control::class);
    }

    public function prueba()
    {
        return $this->belongsTo(Prueba::class);
    }
}
