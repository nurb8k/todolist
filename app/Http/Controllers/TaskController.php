<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function list()
    {
        $tasks = Auth::user()->tasks;
        return view('task.list',compact('tasks'));
    }

    public function store(StoreTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());
        return redirect()->back()->with('status', (__('messages.created')));
    }

    public function destroy(Task $task)
    {
        $this->authorize('touch', $task);
        $task->delete();
        return redirect()->back()->with('status', (__('messages.deleted')));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();
        isset($validated['completed'])? $validated['completed'] = true : $validated['completed'] = false;
        $task->update($validated);
        return redirect()->back()->with('status', (__('messages.updated')));
    }
}
