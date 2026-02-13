<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empresa;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    // Dashboard empresa
    public function index()
    {
        $ofertasActivas = 0;
        $candidatosInscritos = 0;
        $solicitudesPendientes = 0;
        $solicitudesAceptadas = 0;
        $solicitudesRechazadas = 0;

        return view('Empresa.dashboard', compact(
            'ofertasActivas',
            'candidatosInscritos',
            'solicitudesPendientes',
            'solicitudesAceptadas',
            'solicitudesRechazadas'
        ));
    }

    // Formulario de registro
    public function create()
    {
        $sectores = Sector::orderBy('nombre')->get();
        return view('auth.register-empresa', compact('sectores'));
    }

    // Guardar registro
    public function store(Request $request)
    {
        $request->validate([
            'nombre'            => 'required|string|max:150',
            'cif'               => 'required|string|max:20|unique:empresas',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|confirmed|min:6',
            'telefono'          => 'nullable|string|max:20',
            'web'               => 'nullable|string|max:200',
            'persona_contacto'  => 'nullable|string|max:150',
            'email_contacto'    => 'nullable|email|max:150',
            'direccion'         => 'nullable|string|max:200',
            'cp'                => 'nullable|string|max:10',
            'ciudad'            => 'nullable|string|max:100',
            'provincia'         => 'nullable|string|max:100',
            'sectores'          => 'nullable|array',
            'sectores.*'        => 'exists:sectores,id',
            'logo'              => 'nullable|image|max:2048',
        ]);

        // Crear usuario
        $user = User::create([
            'name'     => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'empresa',
        ]);

        // Crear empresa vinculada al usuario
        $empresa = Empresa::create([
            'user_id'          => $user->id,
            'cif'              => $request->cif,
            'nombre'           => $request->nombre,
            'telefono'         => $request->telefono,
            'web'              => $request->web,
            'persona_contacto' => $request->persona_contacto,
            'email_contacto'   => $request->email_contacto,
            'direccion'        => $request->direccion,
            'cp'               => $request->cp,
            'ciudad'           => $request->ciudad,
            'provincia'        => $request->provincia,
            'logo'             => null,
            'verificada'       => false,
        ]);

        // Guardar sectores en la tabla pivote
        if ($request->has('sectores')) {
            $empresa->sectores()->sync($request->sectores);
        }

        // Guardar logo si existe
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $empresa->update(['logo' => $path]);
        }

        // ❌ NO iniciar sesión automáticamente
        // Auth::login($user);

        // ✔ Redirigir al login
        return redirect()->route('login')
            ->with('success', 'Registro completado. Ahora puedes iniciar sesión.');
    }

    public function edit()
    {
        $empresa = auth()->user()->empresa;
        $sectores = Sector::orderBy('nombre')->get();

        return view('empresa.edit', compact('empresa', 'sectores'));
    }

    public function update(Request $request)
    {
        $empresa = auth()->user()->empresa;

        $request->validate([
            'nombre'            => 'required|string|max:150',
            'cif'               => 'required|string|max:20|unique:empresas,cif,' . $empresa->id,
            'telefono'          => 'nullable|string|max:20',
            'web'               => 'nullable|string|max:200',
            'persona_contacto'  => 'nullable|string|max:150',
            'email_contacto'    => 'nullable|email|max:150',
            'direccion'         => 'nullable|string|max:200',
            'cp'                => 'nullable|string|max:10',
            'ciudad'            => 'nullable|string|max:100',
            'provincia'         => 'nullable|string|max:100',
            'sectores'          => 'nullable|array',
            'sectores.*'        => 'exists:sectores,id',
            'logo'              => 'nullable|image|max:2048',
        ]);

        $empresa->update($request->except('sectores', 'logo'));

        if ($request->has('sectores')) {
            $empresa->sectores()->sync($request->sectores);
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $empresa->update(['logo' => $path]);
        }

        return back()->with('success', 'Perfil actualizado correctamente.');
    }
    public function postulaciones(Request $request)
    {
        $empresa = auth()->user()->empresa;

        $query = \App\Models\Postulacion::with(['candidato', 'oferta'])
            ->whereHas('oferta', function ($q) use ($empresa) {
                $q->where('empresa_id', $empresa->id);
            });

        // Filtro por estado
        if ($request->estado) {
            $query->where('estado', $request->estado);
        }

        // Filtro por fecha desde
        if ($request->fecha_desde) {
            $query->whereDate('created_at', '>=', $request->fecha_desde);
        }

        // Filtro por fecha hasta
        if ($request->fecha_hasta) {
            $query->whereDate('created_at', '<=', $request->fecha_hasta);
        }

        // Filtro por palabras clave en mensaje o CV
        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('mensaje', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('cv_personalizado', 'LIKE', "%{$request->keyword}%");
            });
        }

        $postulaciones = $query->orderBy('created_at', 'desc')->get();

        return view('Empresa.postulaciones.index', compact('postulaciones'));
    }

    public function updatePostulacion(Request $request, $id)
    {
        $postulacion = \App\Models\Postulacion::findOrFail($id);

        $postulacion->estado = $request->estado;
        $postulacion->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }
}
