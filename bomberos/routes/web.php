<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

// ✅ Ruta para probar conexión a la base de datos
Route::get('/probar-conexion', function () {
    try {
        DB::connection()->getPdo();
        return "✅ Conexión exitosa a la base de datos: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "❌ Error de conexión: " . $e->getMessage();
    }
});

// ✅ Ruta para mostrar registros de la tabla 'agregar'
Route::get('/mostrar-agregar', function () {
    $registros = DB::table('agregar')->limit(20)->get();
    return view('mostrar_agregar', ['registros' => $registros]);
});

