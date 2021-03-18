<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\produtosController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\parametrosController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //$numero_produtos = DB::table('produtos')->where('status', '=', '1')->count(); compact('numero_produtos')
    return view('inicio/inicio', ); 
}) ->name('inicio');; 

// Rotas Usuários

Route::get('/usuarios', [usuariosController::class, 'buscar'])->name('usuarios');

Route::get('/usuarios/cadastrar', function () {
    return view('usuarios/cadastrar');
})->name('usuarios-cadastrar');

Route::get('/usuarios/alterar', [usuariosController::class, 'visualizar'])->name('usuarios-alterar-visualizar');

Route::post('/usuarios/alterar', [usuariosController::class, 'alterar'])->name('usuarios-alterar');


Route::get('/usuarios/visualizar', [usuariosController::class, 'visualizar'])->name('usuarios-visualizar');

Route::post('/usuarios/verificar-usuario', [usuariosController::class, 'verificarusuarios'])->name('verificar-usuario');

Route::post('/usuarios/cadastrar', [usuariosController::class, 'cadastrar'])->name('usuarios-cadastrar');

Route::post('/usuarios/excluir', [usuariosController::class, 'excluir'])->name('usuarios-excluir');



