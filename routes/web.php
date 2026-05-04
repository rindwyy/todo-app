<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// 1. Menampilkan Halaman Utama & Daftar Tugas (Fitur Orang B)
Route::get('/', [TaskController::class, 'index']);

// 2. Menyimpan Tugas Baru (Fitur Orang A - Kamu)
Route::post('/tasks', [TaskController::class, 'store']);

// 3. Menghapus Tugas (Fitur Orang B)
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);