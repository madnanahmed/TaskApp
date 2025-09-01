<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
           'status' => 'required|in:0,1'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.form', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully.');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully.');
    }
    
    public function toggle(Task $task)
    {
        $task->status = !$task->status;
        $task->save();

        return redirect()->route('tasks.index')
                         ->with('error', 'Task status updated successfully.');
    }
}
