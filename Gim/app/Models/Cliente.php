<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'Clave_Cliente';
    use HasFactory;

    public function asignarclases()
    {
        return $this->belongsTo(Asignarclase::class);
    }
}
