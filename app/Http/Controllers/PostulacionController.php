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
            'estado' => 'pendiente',
        ]);

        return back()->with('success', 'Te has inscrito correctamente en esta oferta.');
    }

    /*
    |--------------------------------------------------------------------------
    | EMPRESA: Ver candidatos inscritos en UNA oferta
    |--------------------------------------------------------------------------
    */
    public function index(Oferta $oferta)
    {
        abort_if($oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $postulaciones = $oferta->postulaciones()->with('candidato')->latest()->get();

        return view('empresa.postulaciones.index', compact('oferta', 'postulaciones'));
    }

    /*
    |--------------------------------------------------------------------------
    | EMPRESA: Ver TODAS las postulaciones con filtros
    |--------------------------------------------------------------------------
    */
    public function listado(Request $request)
    {
        $empresa = auth()->user()->empresa;

        $query = Postulacion::whereHas('oferta', function ($q) use ($empresa) {
            $q->where('empresa_id', $empresa->id);
        });

        if ($request->estado) {
            $query->where('estado', $request->estado);
        }

        if ($request->fecha_desde) {
            $query->whereDate('created_at', '>=', $request->fecha_desde);
        }

        if ($request->fecha_hasta) {
            $query->whereDate('created_at', '<=', $request->fecha_hasta);
        }

        if ($request->keyword) {
            $query->where('mensaje', 'LIKE', "%{$request->keyword}%");
        }

        $postulaciones = $query->paginate(10);

        return view('empresa.postulaciones.index', compact('postulaciones'));
    }

    /*
    |--------------------------------------------------------------------------
    | EMPRESA: Cambiar estado
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Postulacion $postulacion)
    {
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
