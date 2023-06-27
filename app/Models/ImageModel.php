<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class ImageModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    
    public function imagenes()
    {
        return $this->hasMany(get_class($this) . 'Imagen'::class, $this->primaryKey);
    }
}