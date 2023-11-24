<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\API\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function list()
    {
        return TaskResource::collection(Task::query()->get());
    }

    public function create (StoreTaskRequest $request) {
        $request->user()->tasks()->create($request->validated());
        return response()->json(['message'=>'Task created']);
    }

    public function update (UpdateTaskRequest $request, Task $task) {
        $this->authorize('touch', $task);
        $task->update($request->validated());
        return response()->json(['message'=>'Task updated']);
    }

    public function delete (Task $task) {
        $this->authorize('touch', $task);
        $task->delete();
        return response()->json(['message'=>'Task deleted']);
    }
}
