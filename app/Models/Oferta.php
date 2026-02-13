<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'sector_id',
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
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
