<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

/** Vistas de los formularios de registro */
Route::get('/login', [LoginController::class, 'form_login'])->name('form_login');
Route::get('/registro', [LoginController::class, 'form_registro'])->name('form_registro');
/** Autenticación  del controlador */
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/registro', [LoginController::class, 'registro'])->name('registro');
Route::post('/cerrar_sesion', [LoginController::class, 'cerrar_sesion'])->name('cerrar_sesion');

/** Rutas de logueo */
Route::prefix('/dashboard')->middleware('auth')->group(function() {
        Route::get('/home', [UsuarioController::class, 'index'])->name('home');
        Route::get('/usuarios', [UsuarioController::class, 'listar_usuarios'])->name('usuarios');
        Route::post('/usuarios/verificar/{id}', [UsuarioController::class, 'aprobar_usuario'])->name('aprobar_usuario');
        Route::get('/usuarios/{id}', [UsuarioController::class, 'edit'])->name('mi_cuenta');
        Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('mi_cuenta_update');
        Route::post('/clientes', [ClienteController::class, 'store'])->name('NuevoCliente');
        Route::get('/clientes/create', [ClienteController::class, 'create'])->name('create_clientes');
        Route::get('/clientes', [ClienteController::class, 'index'])->name('listar_clientes');
});

