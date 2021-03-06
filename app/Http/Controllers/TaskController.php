<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class TaskController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:task_show|task_create|task_edit|task-delete', ['only' => ['index']]);
    //     $this->middleware('permission:task_create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:task_edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:task_delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $roles = Role::from('roles as r')
                     ->where('mhr.model_id', Auth::user()->id) 
                     ->join('model_has_roles as mhr', function($join){
                        $join->on('mhr.role_id', '=', 'r.id');
                        $join->where('mhr.model_type', 'App\Models\User');
                     })      
                     ->pluck('r.id')->toArray();

        $query = Task::query()->from('tasks as t');
       
        if(!in_array(1, $roles)){
            $tasks = $query->where('assigned_to', Auth::user()->id);
        }

        $tasks = $query->paginate(10);
        
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::where('status', 1)
            ->selectRaw("concat(fname,' ',lname) as fullname, id")
            ->pluck('fullname', 'id');

        return view('task.created', compact('users'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'description' => 'required',
            'status' => 'required',
        ]);

        Task::create(array_merge($request->all(), ['owner' => Auth::user()->id, 'assigned_to' => !empty($request->assigned_to) ? $request->assigned_to : auth()->user->id]));
        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
    }

    public function tasksUser(){
        $tasks = Task::where('assigned_to', Auth::user()->id)
                    ->where('status', '<>', 'Finalizada')
                    ->get();
        return ['tasks' => $tasks, 'countTasks' => $tasks->count()];
    }

    public function edit(Task $task)
    {
        $users = User::where('status', 1)
        ->selectRaw("concat(fname,' ',lname) as fullname, id")
        ->pluck('fullname', 'id');

        return view('task.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        request()->validate([
            'description' => 'required',
            'status' => 'required'
        ]);

        $request->assign_to = !empty($request->assign_to) ? $request->assigned_to : Auth::user()->id;

        $task->update($request->all());
        

        
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
