<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route untuk menampilkan halaman utama (Read)
Route::get('/', [TaskController::class, 'index']);

// Route untuk menghapus tugas (Delete)
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);