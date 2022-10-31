<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ejercicio extends Model
{
    protected $primaryKey = "Clave_Ejercicio";
    use HasFactory;
    public function recurso(){
        return $this->belongsTo(Recurso::class,'Clave_RecursoFK1', 'Clave_Recurso');
    }
}
