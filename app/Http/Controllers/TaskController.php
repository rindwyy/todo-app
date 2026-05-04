<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TaskController extends Controller
{
    // --- FITUR TEMANMU (READ) ---
    public function index() 
    {
        $tasks = Task::latest()->get(); 
        return view('index', compact('tasks')); 
    }

    // --- FITUR KAMU (CREATE) ---
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
        ]);

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->save();

        return redirect()->back()->with('success', 'Task berhasil ditambahkan!');
    }

    // --- FITUR TEMANMU (DELETE) ---
    public function destroy($id) 
    {
        try {
            Task::destroy($id); 
            return redirect()->back()->with('success', 'Tugas berhasil dihapus!'); 
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus tugas.');
        }
    }
}