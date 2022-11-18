<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $primaryKey = 'Clave_Rutina';
    use HasFactory;

    public function asignado(){
        return $this->belongsTo(Asignado::class,'Clave_RutinaFK1','Clave_Rutina');
    }

}
