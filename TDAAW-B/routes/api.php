<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerrosController;

Route::group(['prefix' => 'perro'], function () {
    Route::post('newPerro', [PerrosController::class, 'registrarPerro']);
    Route::put('updatePerro/{id}', [PerrosController::class, 'actualizarPerro']);
    Route::get('getAllPerros', [PerrosController::class, 'listarPerros']);
    Route::get('getPerro/{id}', [PerrosController::class, 'listarPerro']);
    Route::delete('deletePerro/{id}', [PerrosController::class, 'eliminarPerro']);
});
