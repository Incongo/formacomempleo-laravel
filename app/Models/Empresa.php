<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'empresas';

    protected $fillable = [
        'user_id',
        'cif',
        'nombre',
        'telefono',
        'web',
        'persona_contacto',
        'email_contacto',
        'direccion',
        'cp',
        'ciudad',
        'provincia',
        'logo',
        'verificada',
    ];

    protected $casts = [
        'verificada' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos con sectores
    public function sectores()
    {
        return $this->belongsToMany(
            Sector::class,
            'empresa_sector',
            'idempresa',
            'idsector'
        );
    }

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }

    public function postulaciones()
    {
        return $this->hasManyThrough(Postulacion::class, Oferta::class);
    }
}
