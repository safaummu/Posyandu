<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\TController;

Route::post('/update', [BalitaController::class, 'update']);

Route::get('/', [BalitaController::class, 'index']);
Route::post('/simpan', [BalitaController::class, 'store']);
Route::post('/update', [BalitaController::class, 'update']);
Route::get('/hapus/{id}', [BalitaController::class, 'delete']);

Route::get('/statistik', [BalitaController::class, 'statistik']);
Route::get('/laporan', [BalitaController::class, 'laporan']);
Route::get('/grafik', [BalitaController::class, 'grafik']);
Route::get('/laporan', [BalitaController::class, 'laporan']);

Route::get('/login', [TController::class, 'showLogin']);
Route::post('/login', [TController::class, 'login']);

Route::get('/logout', [TController::class, 'logout']);

Route::get('/dashboard', [BalitaController::class, 'index'])->middleware('auth');

Route::get('/', function () {
    return redirect('/login');
});