<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('/cadastrarmedico', [EventController::class, 'getCadastrarMedico']);
Route::post('/cadastrarmedico', [EventController::class, 'createMedico']);
Route::delete('/cadastrarmedico/{id}', [EventController::class, 'deleteMedico']);
Route::get('/cadastrarmedico/edit/{id}', [EventController::class, 'editMedico']);
Route::put('/cadastrarmedico/update/{id}', [EventController::class, 'updateMedico']);

Route::get('/cadastrarpaciente', [EventController::class, 'getCadastrarPaciente']);
Route::post('/cadastrarpaciente', [EventController::class, 'createPaciente']);
Route::delete('/cadastrarpaciente/{id}', [EventController::class, 'deletePaciente']);
Route::get('/cadastrarpaciente/edit/{id}', [EventController::class, 'editPaciente']);
Route::put('/cadastrarpaciente/update/{id}', [EventController::class, 'updatePaciente']);

Route::get('/cadastrarespecialidade', [EventController::class, 'getCadastrarEspecialidade']);
Route::post('/cadastrarespecialidade', [EventController::class, 'createEspecialidade']);

Route::get('/marcarconsulta', [EventController::class, 'getCadastrarConsulta']);
Route::get('/marcarconsultapaciente', [EventController::class, 'getConsultaPaciente']);
Route::post('/marcarconsulta', [EventController::class, 'createConsulta']);



