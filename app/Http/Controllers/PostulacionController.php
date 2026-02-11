<?php

namespace App\Http\Controllers;

use App\Models\Postulacion;
use App\Models\Oferta;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CANDIDATO: Inscribirse a una oferta
    |--------------------------------------------------------------------------
    */
    public function store(Request $request, Oferta $oferta)
    {
        $candidato = auth()->user()->candidato;

        // Evitar inscripciones duplicadas
        $existe = Postulacion::where('candidato_id', $candidato->id)
            ->where('oferta_id', $oferta->id)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Ya estás inscrito en esta oferta.');
        }

        $request->validate([
            'mensaje' => 'nullable|string|max:2000',
            'cv_personalizado' => 'nullable|file|mimes:pdf,doc,docx,odt,jpg|max:2048',
        ]);

        $cvPath = null;

        if ($request->hasFile('cv_personalizado')) {
            $cvPath = $request->file('cv_personalizado')->store('cv_personalizados', 'public');
        }

        Postulacion::create([
            'candidato_id' => $candidato->id,
            'oferta_id' => $oferta->id,
            'mensaje' => $request->mensaje,
            'cv_personalizado' => $cvPath,
            'estado' => 'pendiente', // ← ESTO ES LO QUE FALTABA
        ]);

        return back()->with('success', 'Te has inscrito correctamente en esta oferta.');
    }



    /*
    |--------------------------------------------------------------------------
    | EMPRESA: Ver candidatos inscritos en una oferta
    |--------------------------------------------------------------------------
    */
    public function index(Oferta $oferta)
    {
        // Seguridad: solo la empresa dueña puede ver las postulaciones
        abort_if($oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $postulaciones = $oferta->postulaciones()->with('candidato')->latest()->get();

        return view('empresa.postulaciones.index', compact('oferta', 'postulaciones'));
    }

    /*
    |--------------------------------------------------------------------------
    | EMPRESA: Cambiar estado (aceptar / rechazar)
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Postulacion $postulacion)
    {
        // Seguridad: solo la empresa dueña puede modificar
        abort_if($postulacion->oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $request->validate([
            'estado' => 'required|in:pendiente,aceptado,rechazado',
        ]);

        $postulacion->update([
            'estado' => $request->estado,
        ]);

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    /*
    |--------------------------------------------------------------------------
    | EMPRESA: Eliminar postulación
    |--------------------------------------------------------------------------
    */
    public function destroy(Postulacion $postulacion)
    {
        abort_if($postulacion->oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $postulacion->delete();

        return back()->with('success', 'Postulación eliminada correctamente.');
    }
}
