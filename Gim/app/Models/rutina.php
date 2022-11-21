<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $primaryKey = 'Clave_Rutina';
    use HasFactory;
    public function ejercicios(){
        return $this->belongsToMany(Ejercicio::class,'Asignados','Clave_RutinaFK1', 'Clave_EjercicioFK2');
    }

}
