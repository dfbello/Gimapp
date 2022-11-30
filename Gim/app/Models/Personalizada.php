<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalizada extends Model
{
    use HasFactory;

    protected $primaryKey = 'Clave_Personalizada';

    /**
     * Get the entrenador that owns the Personalizada
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entrenador(){

        return $this->belongsTo(Entrenador::class, 'Clave_EntrenadorFK2', 'Clave_Entrenador');
    }
    
    /**
     * The cliente that belong to the Personalizada
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'asignarpersonalizada', 'Clave_EntrenadorFK2', 'Clave_ClienteFK4');
    }
}
