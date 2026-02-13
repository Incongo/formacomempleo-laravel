<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function index()
    {
        $empresa = auth()->user()->empresa;
        $ofertas = $empresa->ofertas()->latest()->get();

        return view('empresa.ofertas.index', compact('ofertas'));
    }

    public function create()
    {
        $sectores = \App\Models\Sector::orderBy('nombre')->get();
        return view('empresa.ofertas.create', compact('sectores'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'salario' => 'nullable|string|max:100',
            'tipo_contrato' => 'nullable|string|max:100',
            'modalidad' => 'nullable|string|max:100',
            'ubicacion' => 'nullable|string|max:150',
            'sector_id' => 'required|exists:sectores,id',
        ]);

        $empresa = auth()->user()->empresa;

        $empresa->ofertas()->create($request->all());

        return redirect()
            ->route('empresa.ofertas.index')
            ->with('success', 'Oferta creada correctamente.');
    }


    public function edit(Oferta $oferta)
    {
        abort_if($oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $sectores = \App\Models\Sector::orderBy('nombre')->get();

        return view('empresa.ofertas.edit', compact('oferta', 'sectores'));
    }


    public function update(Request $request, Oferta $oferta)
    {
        abort_if($oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'salario' => 'nullable|string|max:100',
            'tipo_contrato' => 'nullable|string|max:100',
            'modalidad' => 'nullable|string|max:100',
            'ubicacion' => 'nullable|string|max:150',
            'estado' => 'required|in:activa,pausada,cerrada',
            'sector_id' => 'required|exists:sectores,id',
        ]);

        $oferta->update($request->all());

        return redirect()
            ->route('empresa.ofertas.index')
            ->with('success', 'Oferta actualizada correctamente.');
    }


    public function destroy(Oferta $oferta)
    {
        abort_if($oferta->empresa_id !== auth()->user()->empresa->id, 403);

        $oferta->delete();

        return redirect()
            ->route('empresa.ofertas.index')
            ->with('success', 'Oferta eliminada correctamente.');
    }
    public function show(Oferta $oferta)
    {
        return view('ofertas.show', compact('oferta'));
    }
    public function listadoCandidato(Request $request)
    {
        $query = Oferta::where('estado', 'activa')->with('empresa', 'sector');

        // Filtro por sector
        if ($request->sector_id) {
            $query->where('sector_id', $request->sector_id);
        }

        // Filtro por ubicación
        if ($request->ubicacion) {
            $query->where('ubicacion', 'LIKE', "%{$request->ubicacion}%");
        }

        // Filtro por modalidad
        if ($request->modalidad) {
            $query->where('modalidad', $request->modalidad);
        }

        // Filtro por salario mínimo (si el salario es texto tipo "30000 €/año")
        if ($request->salario_min) {
            $query->whereRaw("CAST(REPLACE(salario, ' €/año', '') AS UNSIGNED) >= ?", [$request->salario_min]);
        }

        $ofertas = $query->latest()->get();
        $sectores = \App\Models\Sector::orderBy('nombre')->get();

        return view('Candidato.ofertas.index', compact('ofertas', 'sectores'));
    }

    public function showCandidato(Oferta $oferta)
    {
        return view('Candidato.ofertas.show', compact('oferta'));
    }
}
