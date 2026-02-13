<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $table = 'sectores';

    protected $fillable = [
        'nombre',
    ];

    public $timestamps = true;

    public function empresas()
    {
        return $this->belongsToMany(
            Empresa::class,
            'empresa_sector',
            'sector_id',
            'empresa_id'
        );
    }
}
