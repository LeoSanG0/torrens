<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:task_show | task_create | task_edit | task-delete', ['only' => ['index']]);
        $this->middleware('permission:task_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:task_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:task_delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tasks = Task::paginate(10);
        return view('task.index', compact('tasks'));

    }

    public function create()
    {
        return view('task.created');
    }

    public function store(Request $request)
    {
        request()->validate([
            'description' => 'required',
            'task_status' => 'required'
        ]);
        Task::create($request->all());
        return redirect()->route('task.index');
    }

    public function show($id)
    {
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        request()->validate([
            'description' => 'required',
            'task_status' => 'required'
        ]);
        $task->update($request->all());
        return redirect()->route('task.index');

    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index');
    }
}
