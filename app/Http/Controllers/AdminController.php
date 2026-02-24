<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Postulacion;

class AdminController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | ESTADÍSTICAS REALES DEL SISTEMA
        |--------------------------------------------------------------------------
        */

        // Ofertas activas en toda la plataforma
        $ofertasActivas = Oferta::where('estado', 'activa')->count();

        // Base de todas las postulaciones
        $postulacionesBase = Postulacion::query();

        // Estadísticas globales
        $candidatosInscritos = (clone $postulacionesBase)->count();
        $solicitudesPendientes = (clone $postulacionesBase)->where('estado', 'pendiente')->count();
        $solicitudesAceptadas = (clone $postulacionesBase)->where('estado', 'aceptado')->count();
        $solicitudesRechazadas = (clone $postulacionesBase)->where('estado', 'rechazado')->count();

        return view('admin.dashboard', compact(
            'ofertasActivas',
            'candidatosInscritos',
            'solicitudesPendientes',
            'solicitudesAceptadas',
            'solicitudesRechazadas'
        ));
    }
}
