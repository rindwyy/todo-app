<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TaskController extends Controller
{
    // Read
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('dashboard', compact('tasks'));
    }

    // Create
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'note' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->note = $request->note;
        $task->deadline = $request->deadline;
        $task->save();

        return redirect()->back()->with('success', 'Task berhasil ditambahkan!');
    }

    // Delete
    public function destroy($id)
    {
        try {
            Task::destroy($id);
            return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus tugas!');
        }
    }
}
