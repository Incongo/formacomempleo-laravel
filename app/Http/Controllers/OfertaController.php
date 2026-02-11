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
        return view('empresa.ofertas.create');
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

        return view('empresa.ofertas.edit', compact('oferta'));
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
    public function listadoCandidato()
    {
        $ofertas = Oferta::where('estado', 'activa')
            ->latest()
            ->with('empresa')
            ->get();

        return view('Candidato.ofertas.index', compact('ofertas'));
    }
    public function showCandidato(Oferta $oferta)
    {
        return view('Candidato.ofertas.show', compact('oferta'));
    }
}
