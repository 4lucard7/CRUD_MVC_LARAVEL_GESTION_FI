<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formations', [FormationController::class, 'index'])->name("formations.index");
Route::get('/formations/create', [FormationController::class, 'create'])->name("formations.create");
Route::post('/formations', [FormationController::class, 'store'])->name("formations.store");
Route::get('/formations/{id}', [FormationController::class, 'show'])->name("formations.show");
Route::get('/formations/{id}/edit', [FormationController::class, 'edit'])->name("formations.edit");
Route::put('/formations/{id}', [FormationController::class, 'update'])->name("formations.update");
Route::delete('/formations/{id}', [FormationController::class, 'delete'])->name("formations.delete");

Route::get('/inscriptions', [InscriptionController::class, 'index'])->name("inscriptions.index");
Route::get('/inscriptions/create', [InscriptionController::class, 'create'])->name("inscriptions.create");
Route::post('/inscriptions', [InscriptionController::class, 'store'])->name("inscriptions.store");
Route::get('/inscriptions/{id}', [InscriptionController::class, 'show'])->name("inscriptions.show");
Route::get('/inscriptions/{id}/edit', [InscriptionController::class, 'edit'])->name("inscriptions.edit");
Route::put('/inscriptions/{id}', [InscriptionController::class, 'update'])->name("inscriptions.update");
Route::delete('/inscriptions/{id}', [InscriptionController::class, 'delete'])->name("inscriptions.delete");
