<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;
    protected $table = 'postulaciones';
    protected $fillable = [
        'candidato_id',
        'oferta_id',
        'estado',
        'mensaje',
        'cv_personalizado',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    // Una postulación pertenece a un candidato
    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    // Una postulación pertenece a una oferta
    public function oferta()
    {
        return $this->belongsTo(Oferta::class);
    }
}
