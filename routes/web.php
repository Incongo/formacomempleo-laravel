<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\RegisterTypeController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PostulacionController;


/*
|--------------------------------------------------------------------------
| PÁGINA PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| REGISTRO PERSONALIZADO
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterTypeController::class, 'index'])
    ->name('register');

/*
|--------------------------------------------------------------------------
| REGISTRO DE EMPRESA
|--------------------------------------------------------------------------
*/
Route::get('/register/empresa', [EmpresaController::class, 'create'])
    ->name('register.empresa');

Route::post('/register/empresa', [EmpresaController::class, 'store'])
    ->name('register.empresa.store');

/*
|--------------------------------------------------------------------------
| REGISTRO DE CANDIDATO
|--------------------------------------------------------------------------
*/
Route::get('/register/candidato', [CandidatoController::class, 'create'])
    ->name('register.candidato');

Route::post('/register/candidato', [CandidatoController::class, 'store'])
    ->name('register.candidato.store');

/*
|--------------------------------------------------------------------------
| VISTA PÚBLICA DE UNA OFERTA
|--------------------------------------------------------------------------
*/
Route::get('/ofertas/{oferta}', [OfertaController::class, 'show'])
    ->name('ofertas.show');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (solo usuarios autenticados)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Redirección automática según rol
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', function () {

        $role = auth()->user()->role->value;

        return match ($role) {
            'admin'     => redirect()->route('admin.dashboard'),
            'empresa'   => redirect()->route('empresa.dashboard'),
            'candidato' => redirect()->route('candidato.dashboard'),
            default => abort(403),
        };
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])
            ->name('admin.dashboard');
    });

    /*
|--------------------------------------------------------------------------
| EMPRESA
|--------------------------------------------------------------------------
*/
    Route::middleware('role:empresa')->group(function () {
        Route::get('/empresa/dashboard', [EmpresaController::class, 'index'])
            ->name('empresa.dashboard');

        /*
    |--------------------------------------------------------------------------
    | PERFIL EMPRESA
    |--------------------------------------------------------------------------
    */
        Route::get('/empresa/perfil/editar', [EmpresaController::class, 'edit'])
            ->name('empresa.perfil.edit');

        Route::post('/empresa/perfil/actualizar', [EmpresaController::class, 'update'])
            ->name('empresa.perfil.update');

        /*
    |--------------------------------------------------------------------------
    | OFERTAS DE EMPLEO (CRUD)
    |--------------------------------------------------------------------------
    */
        Route::get('/empresa/ofertas', [OfertaController::class, 'index'])
            ->name('empresa.ofertas.index');

        Route::get('/empresa/ofertas/crear', [OfertaController::class, 'create'])
            ->name('empresa.ofertas.create');

        Route::post('/empresa/ofertas', [OfertaController::class, 'store'])
            ->name('empresa.ofertas.store');

        Route::get('/empresa/ofertas/{oferta}/editar', [OfertaController::class, 'edit'])
            ->name('empresa.ofertas.edit');

        Route::post('/empresa/ofertas/{oferta}', [OfertaController::class, 'update'])
            ->name('empresa.ofertas.update');

        Route::delete('/empresa/ofertas/{oferta}', [OfertaController::class, 'destroy'])
            ->name('empresa.ofertas.destroy');

        /*
    |--------------------------------------------------------------------------
    | POSTULACIONES — EMPRESA
    |--------------------------------------------------------------------------
    */
        Route::get('/empresa/ofertas/{oferta}/postulaciones', [PostulacionController::class, 'index'])
            ->name('empresa.postulaciones.index');

        Route::post('/empresa/postulaciones/{postulacion}/estado', [PostulacionController::class, 'update'])
            ->name('empresa.postulaciones.update');

        Route::delete('/empresa/postulaciones/{postulacion}', [PostulacionController::class, 'destroy'])
            ->name('empresa.postulaciones.destroy');
    });

    /*
|--------------------------------------------------------------------------
| CANDIDATO
|--------------------------------------------------------------------------
*/
    Route::middleware('role:candidato')->group(function () {

        /*
    |--------------------------------------------------------------------------
    | DASHBOARD CANDIDATO
    |--------------------------------------------------------------------------
    */
        Route::get('/candidato/dashboard', [CandidatoController::class, 'index'])
            ->name('candidato.dashboard');

        /*
    |--------------------------------------------------------------------------
    | PERFIL CANDIDATO
    |--------------------------------------------------------------------------
    */
        Route::get('/candidato/perfil/editar', [CandidatoController::class, 'edit'])
            ->name('candidato.perfil.edit');

        Route::post('/candidato/perfil/actualizar', [CandidatoController::class, 'update'])
            ->name('candidato.perfil.update');

        /*
    |--------------------------------------------------------------------------
    | OFERTAS DISPONIBLES — CANDIDATO
    |--------------------------------------------------------------------------
    */
        Route::get('/candidato/ofertas', [OfertaController::class, 'listadoCandidato'])
            ->name('candidato.ofertas.index');

        /*
    |--------------------------------------------------------------------------
    | POSTULACIONES — CANDIDATO
    |--------------------------------------------------------------------------
    */
        Route::get('/candidato/ofertas/{oferta}', [OfertaController::class, 'showCandidato'])
            ->name('candidato.ofertas.show');
    });
    Route::post('/candidato/ofertas/{oferta}/postular', [PostulacionController::class, 'store'])
        ->name('candidato.postular');
});
