<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rute untuk Landing Page (Halaman Depan)
Route::get('/', function () {
    return view('landing');
});

// Rute untuk Dashboard (Aplikasi Utama)
Route::get('/dashboard', [TaskController::class, 'index']);

// Rute untuk menambahkan data (Create)
Route::post('/tasks', [TaskController::class, 'store']);

// Rute untuk menghapus data (Delete)
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);