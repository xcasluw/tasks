<?php

namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {

        return Task::all();

    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|min:5",
            "complete" => "required"
        ]);

        $task = Task::create([
            "name" => $request->input("name"),
            "complete" => $request->input("complete")
        ]);

        return $task;
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {

        $request->validate([
            "name" => "required|min:5"
        ]);

        $task->name     = $request->input("name");
        $task->complete = $request->input("complete");
        $task->save();

        return $task;
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return response()->json(["success" => true]);
    }
}
