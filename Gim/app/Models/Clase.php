<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    protected $primaryKey = 'Clave_Clase';

    /**
     * Get the entrenador that owns the Clase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entrenador(){

        return $this->belongsTo(Entrenador::class, 'Clave_EntrenadorFK1', 'Clave_Entrenador');
    }
    
}

