<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TEMPORAL
        |--------------------------------------------------------------------------
        | Estos valores simulan lo que luego vendrá de la base de datos.
        | Cuando tengas las tablas, aquí pondremos los count() reales.
        */

        $ofertasActivas = 0;
        $candidatosInscritos = 0;
        $solicitudesPendientes = 0;
        $solicitudesAceptadas = 0;
        $solicitudesRechazadas = 0;

        return view('admin.dashboard', compact(
            'ofertasActivas',
            'candidatosInscritos',
            'solicitudesPendientes',
            'solicitudesAceptadas',
            'solicitudesRechazadas'
        ));
    }
}
