<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenamiento extends Model
{
    protected $primaryKey = "Clave_Entrenamiento";
    use HasFactory;
    public function cliente(){
        return $this->belongsTo(Cliente::class,'Clave_ClienteFK2','Clave_Cliente');
    }
}
