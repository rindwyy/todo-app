<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Wajib ditambahkan agar bisa memanggil tabel tasks

class TaskController extends Controller
{
    // Fungsi untuk Read (Menampilkan Data)
    public function index() 
    {
        // Mengambil semua data dari tabel tasks, urutkan dari yang terbaru
        $tasks = Task::latest()->get(); 
        
        // Mengirim data $tasks ke tampilan (view) bernama 'index'
        return view('index', compact('tasks')); 
    }

    // Fungsi untuk Delete (Menghapus Data)
    public function destroy($id) 
    {
        // Menghapus tugas berdasarkan ID secara aman (mencegah error jika ID tidak ditemukan)
        Task::destroy($id); 
        
        // Mengembalikan halaman setelah dihapus
        return redirect()->back()->with('success', 'Tugas berhasil dihapus!'); 
    }
}