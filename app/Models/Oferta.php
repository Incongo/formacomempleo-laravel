<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'empresa_id',
        'titulo',
        'descripcion',
        'salario',
        'tipo_contrato',
        'modalidad',
        'ubicacion',
        'estado',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }
}
