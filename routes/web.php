<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/libro',[LibroController::class,'index'])
    ->name('libroindex');

Route::get('/libros/{id}',[LibroController::class, 'show'])
    ->where('id','[0-9]+')->name('libro.show');

Route::get('/libros',[LibroController::class, 'create'])
    ->name('librocreate');

Route::post('/libros/crear', [LibroController::class, 'store'])
    ->name('libro.guardar');

Route::get('/libros/editar/{id}',[LibroController::class, 'edit'])
    ->name('editar.libro')-> where ('id','[0-9]+');

Route::put('/libros/update/{id}',[LibroController::class, 'update'])
    ->name('libro.update')-> where ('id','[0-9]+');

Route::delete('/libros/{id}',[LibroController::class, 'destroy'])
    ->name('libro.borrar')->where('id','[0-9]+');


     // Rutas para prestamos

Route::get('/prestamo',[PrestamoController::class,'index'])
-> name('prestamoindex');

Route::get('/prestamos/{id}',[PrestamoController::class, 'show'])
->where('id','[0-9]+')->name('verprestamo');

Route::get('/prestamos',[PrestamoController::class, 'create'])
->name('prestamocreate');

Route::post('/prestamos/crear', [PrestamoController::class, 'store'])
->name('prestamo.guardar');

Route::get('/prestamos/editar/{id}',[PrestamoController::class, 'edit'])
->name('editar.prestamo')-> where ('id','[0-9]+');

Route::put('/prestamos/update/{id}',[PrestamoController::class, 'update'])
->name('prestamo.update')-> where ('id','[0-9]+');

Route::delete('/prestamos/{id}',[PrestamoController::class, 'destroy'])
->name('prestamo.borrar')->where('id','[0-9]+');



    // Rutas para usuarios

    Route::get('/usuario',[UsuarioController::class,'index'])
    ->name('usuarioindex');

    Route::get('/usuarios',[UsuarioController::class, 'create'])
    ->name('usuariocreate');

    Route::get('/usuarios/{id}',[UsuarioController::class, 'show'])
    ->where('id','[0-9]+')->name('verusuario');

    Route::post('/usuarios/crear', [UsuarioController::class, 'store'])
    ->name('usuario.guardar');

    Route::get('/usuarios/editar/{id}',[UsuarioController::class, 'edit'])
    ->name('editarusuario')-> where ('id','[0-9]+');

Route::put('/usuarios/update/{id}',[UsuarioController::class, 'update'])
    ->name('usuario.update')-> where ('id','[0-9]+');

Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])
    ->name('usuario.borrar')->where('id','[0-9]+');







