<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CandidatoController extends Controller
{
    // Dashboard candidato
    public function index()
    {
        $candidato = auth()->user()->candidato;

        /*
    |--------------------------------------------------------------------------
    | DATOS REALES DEL SISTEMA
    |--------------------------------------------------------------------------
    */

        // Ofertas activas disponibles
        $ofertasDisponibles = \App\Models\Oferta::where('estado', 'activa')->count();

        // Postulaciones del candidato
        $candidatosInscritos = $candidato->postulaciones()->count();

        // Empresas registradas
        $empresasRegistradas = \App\Models\Empresa::count();

        // Estados de las postulaciones del candidato
        $solicitudesPendientes = $candidato->postulaciones()
            ->where('estado', 'pendiente')
            ->count();

        $solicitudesAceptadas = $candidato->postulaciones()
            ->where('estado', 'aceptado')
            ->count();

        $solicitudesRechazadas = $candidato->postulaciones()
            ->where('estado', 'rechazado')
            ->count();

        return view('Candidato.dashboard', compact(
            'ofertasDisponibles',
            'candidatosInscritos',
            'empresasRegistradas',
            'solicitudesPendientes',
            'solicitudesAceptadas',
            'solicitudesRechazadas'
        ));
    }


    // Formulario de registro
    public function create()
    {
        return view('auth.register-candidato');
    }

    // Guardar registro
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:100',
            'apellidos'         => 'required|string|max:150',
            'dni'               => 'nullable|string|max:20|unique:candidatos',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|confirmed|min:6',
            'telefono'          => 'nullable|string|max:20',
            'linkedin'          => 'nullable|string|max:255',
            'web'               => 'nullable|string|max:255',
            'direccion'         => 'nullable|string|max:200',
            'cp'                => 'nullable|string|max:10',
            'ciudad'            => 'nullable|string|max:100',
            'provincia'         => 'nullable|string|max:100',
            'fecha_nacimiento'  => 'nullable|date',
        ]);

        // Crear usuario
        $user = User::create([
            'name'     => $request->name . ' ' . $request->apellidos,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'candidato',
        ]);

        // Crear candidato vinculado al usuario
        Candidato::create([
            'user_id'          => $user->id,
            'dni'              => $request->dni,
            'name'             => $request->name,
            'apellidos'        => $request->apellidos,
            'telefono'         => $request->telefono,
            'email'            => $request->email,
            'password_hash'    => Hash::make($request->password),
            'linkedin'         => $request->linkedin,
            'web'              => $request->web,
            'direccion'        => $request->direccion,
            'cp'               => $request->cp,
            'ciudad'           => $request->ciudad,
            'provincia'        => $request->provincia,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        // ❌ NO loguear automáticamente
        // Auth::login($user);

        // ✔ Redirigir al login
        return redirect()->route('login')
            ->with('success', 'Registro completado. Ahora puedes iniciar sesión.');
    }

    public function edit()
    {
        $candidato = auth()->user()->candidato;
        return view('candidato.edit', compact('candidato'));
    }

    public function update(Request $request)
    {
        $candidato = auth()->user()->candidato;

        $request->validate([
            'name'              => 'required|string|max:100',
            'apellidos'         => 'required|string|max:150',
            'dni'               => 'nullable|string|max:20|unique:candidatos,dni,' . $candidato->id,
            'telefono'          => 'nullable|string|max:20',
            'linkedin'          => 'nullable|string|max:255',
            'web'               => 'nullable|string|max:255',
            'direccion'         => 'nullable|string|max:200',
            'cp'                => 'nullable|string|max:10',
            'ciudad'            => 'nullable|string|max:100',
            'provincia'         => 'nullable|string|max:100',
            'fecha_nacimiento'  => 'nullable|date',
            'foto'              => 'nullable|image|max:2048',
            'cv'                => 'nullable|mimes:pdf,doc,docx|max:4096',
        ]);

        $candidato->update($request->except('foto', 'cv'));

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $candidato->update(['foto' => $path]);
        }

        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('cv', 'public');
            $candidato->update(['cv' => $path]);
        }

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
}
