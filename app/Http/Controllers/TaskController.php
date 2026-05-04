<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
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

    // Read
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('dashboard', compact('tasks'));
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
    