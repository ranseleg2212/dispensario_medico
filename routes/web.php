<?php

use App\Http\Controllers\HistorialController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\RecetaController;
use App\Models\Medicamento;
use App\Models\Medico;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeguimientoController;


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
    return view('bts');
});

// *OTRAS
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// *MEDICAMENTOS
Route::get('/medicamentos/create', 'App\Http\Controllers\MedicamentoController@create')->name('medicamentos.create')->middleware('auth', 'checkrole:admin');;
Route::get('/medicamentos', 'App\Http\Controllers\MedicamentoController@index')->name('medicamentos.index')->middleware('auth', 'checkrole:admin,consulta,medico');
Route::post('/medicamentos', 'App\Http\Controllers\MedicamentoController@store')->name('medicamentos.store')->middleware('auth', 'checkrole:admin');
Route::delete('/medicamentos/{id}', 'App\Http\Controllers\MedicamentoController@destroy')->name('medicamentos.destroy')->middleware('auth', 'checkrole:admin');
Route::get('/medicamentos/{id}', 'App\Http\Controllers\MedicamentoController@show')->name('medicamentos.show')->middleware('auth', 'checkrole:admin');
Route::get('/medicamentos/{id}/edit', 'App\Http\Controllers\MedicamentoController@edit')->name('medicamentos.edit')->middleware('auth', 'checkrole:admin');
Route::put('/medicamentos/{id}', 'App\Http\Controllers\MedicamentoController@update')->name('medicamentos.update')->middleware('auth', 'checkrole:admin');

// *RECETAS
Route::get('/recetas/create/{pacienter_id}', 'App\Http\Controllers\RecetaController@create')->name('recetas.create')->middleware('auth', 'checkrole:medico,admin');
Route::get('/recetas', 'App\Http\Controllers\RecetaController@index')->name('recetas.index')->middleware('auth', 'checkrole:admin');
Route::post('/recetas', 'App\Http\Controllers\RecetaController@store')->name('recetas.store')->middleware('auth', 'checkrole:medico,admin');
Route::delete('/recetas/{id}', 'App\Http\Controllers\RecetaController@destroy')->name('recetas.destroy')->middleware('auth', 'checkrole:admin');;
Route::get('/recetas/{id}', 'App\Http\Controllers\RecetaController@show')->name('recetas.show')->middleware('auth', 'checkrole:admin');;
Route::get('/recetas/{id}/edit', 'App\Http\Controllers\RecetaController@edit')->name('recetas.edit')->middleware('auth', 'checkrole:admin');;

// *HISTORIALES
Route::get('/historials/create/{paciente_id}', 'App\Http\Controllers\HistorialController@create')->name('historials.create')->middleware('auth', 'checkrole:medico,admin');;
Route::get('/historials', 'App\Http\Controllers\HistorialController@index')->name('historials.index')->middleware('auth', 'checkrole:admin');
Route::post('/historials', 'App\Http\Controllers\HistorialController@store')->name('historials.store')->middleware('auth', 'checkrole:medico,admin');;
Route::delete('/historials/{id}', 'App\Http\Controllers\HistorialController@destroy')->name('historials.destroy')->middleware('auth', 'checkrole:admin');
Route::get('/historials/{id}', 'App\Http\Controllers\HistorialController@show')->name('historials.show')->middleware('auth', 'checkrole:admin');
Route::get('/historials/{id}/edit', 'App\Http\Controllers\HistorialController@edit')->name('historials.edit')->middleware('auth', 'checkrole:admin');
Route::put('/historials/{id}', 'App\Http\Controllers\HistorialController@update')->name('historials.update')->middleware('auth', 'checkrole:admin');

// *PACIENTES
Route::get('/pacientes', 'App\Http\Controllers\PacienteController@index')->name('pacientes.index')->middleware('auth');
Route::resource('/pacientes', App\Http\Controllers\PacienteController::class)->middleware('auth', 'checkrole:admin,medico');

//*MEDICOS
Route::get('/medicos', 'App\Http\Controllers\MedicoController@index')->name('medicos.index');
Route::get('/medicos/create', 'App\Http\Controllers\MedicoController@create')->name('medicos.create')->middleware('auth', 'checkrole:admin');
Route::get('/medicos/{id}/edit', 'App\Http\Controllers\MedicoController@edit')->name('medicos.edit')->middleware('auth', 'checkrole:admin');
Route::put('/medicos/{id}', 'App\Http\Controllers\MedicoController@update')->name('medicos.update')->middleware('auth', 'checkrole:admin');
Route::delete('/medicos/{id}', 'App\Http\Controllers\MedicoController@destroy')->name('medicos.destroy')->middleware('auth', 'checkrole:admin');
Route::post('/medicos', 'App\Http\Controllers\MedicoController@store')->name('medicos.store')->middleware('auth', 'checkrole:admin');
Route::get('/medicos/{id}', 'App\Http\Controllers\MedicoController@show')->name('medicos.show')->middleware('auth', 'checkrole:admin');
Route::resource('/medicos', App\Http\Controllers\MedicoController::class)->middleware('auth', 'checkrole:admin');


Route::resource('/users', App\Http\Controllers\UserController::class)->middleware('auth', 'checkrole:admin');

// *ESPECIALIDADES
Route::get('/especialidads', 'App\Http\Controllers\EspecialidadController@index')->name('especialidads.index')->middleware('auth', 'checkrole:consulta,admin,medico');
Route::get('/especialidads/create', 'App\Http\Controllers\EspecialidadController@create')->name('especialidads.create')->middleware('auth', 'checkrole:admin');
Route::get('/especialidads/{id}/edit', 'App\Http\Controllers\EspecialidadController@edit')->name('especialidads.edit')->middleware('auth', 'checkrole:admin');
Route::put('/especialidads/{id}', 'App\Http\Controllers\EspecialidadController@update')->name('especialidads.update')->middleware('auth', 'checkrole:admin');
Route::delete('/especialidads/{id}', 'App\Http\Controllers\EspecialidadController@destroy')->name('especialidads.destroy')->middleware('auth', 'checkrole:admin');
Route::post('/especialidads', 'App\Http\Controllers\EspecialidadController@store')->name('especialidads.store')->middleware('auth', 'checkrole:admin');
Route::get('/especialidads/{id}', 'App\Http\Controllers\EspecialidadController@show')->name('especialidads.show')->middleware('auth', 'checkrole:consulta,admin,medico');

// *CONSULTAS DE SEGUIMIENTO
Route::get('/seguimiento', 'App\Http\Controllers\SeguimientoController@index')->name('seguimientos.index')->middleware('auth', 'checkrole:admin');;
Route::get('/seguimiento/create/{historial}', 'App\Http\Controllers\SeguimientoController@create')->name('seguimientos.create')->middleware('auth', 'checkrole:admin,medico');;
Route::get('/seguimiento/{id}/edit', 'App\Http\Controllers\SeguimientoController@edit')->name('seguimientos.edit')->middleware('auth', 'checkrole:admin');;
Route::put('/seguimiento/{id}', 'App\Http\Controllers\SeguimientoController@update')->name('seguimientos.update')->middleware('auth', 'checkrole:admin');;
Route::delete('/seguimiento/{id}', 'App\Http\Controllers\SeguimientoController@destroy')->name('seguimientos.destroy')->middleware('auth', 'checkrole:admin');;
Route::post('/seguimiento', 'App\Http\Controllers\SeguimientoController@store')->name('seguimientos.store')->middleware('auth', 'checkrole:admin,medico');;
Route::get('/seguimiento/{id}', 'App\Http\Controllers\SeguimientoController@show')->name('seguimientos.show')->middleware('auth', 'checkrole:admin');;
