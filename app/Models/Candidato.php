<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'candidatos';

    protected $fillable = [
        'user_id',
        'dni',
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'password_hash',
        'linkedin',
        'web',
        'cv',
        'foto',
        'direccion',
        'cp',
        'ciudad',
        'provincia',
        'fecha_nacimiento',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class);
    }
}
