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
        ]);

        $task = new Task();
        $task->task_name = $request->task_name;
        $task->save();

        return redirect()->back()->with('success', 'Task berhasil ditambahkan!');
    }
}
