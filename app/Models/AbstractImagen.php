<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractImagen extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['main'];


    public function entityOwner()
    {
        $className = substr(get_class($this), 0, -6);
        $class = new $className;
        return $this->belongsTo($class::class);
    }

    public function save(array $options = [])
    {
        $entityOwner = $this->entityOwner();
        
        // Set every image entity not main but selected.
        if ($this->main && false == $this->getOriginal('main')) {
            get_class($this)::where(
                [
                    ['id', '!=', $this->id],
                    [$entityOwner->getOwnerKeyName(), '=', $this->{$entityOwner->getOwnerKeyName()}],
                ]
            )->update(['main' => false]);
        }

        return parent::save($options);
    }
}
