<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Получить все задачи
    public function index()
    {
        return Task::all();
    }

    // Создать новую задачу
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:pending,in_progress,done',
        ]);

        $task = Task::create($data);
        return response()->json($task, 201);
    }

    // Показать конкретную задачу
    public function show(Task $task)
    {
        return $task;
    }

    // Обновить задачу
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'in:pending,in_progress,done',
        ]);

        $task->update($data);
        return $task;
    }

    // Удалить задачу
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
