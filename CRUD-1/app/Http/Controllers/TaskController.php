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
        return view('Main', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Task::all();
        return view('handlers.create', compact('tasks'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create([
            'Task_Name' =>$request->Task_Name
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id = null)
    // {
    //     $task = Task::find($id);

    //     if (!$task) {
    //         return redirect()->route('tasks.index')->with('error', 'Task not found.');
    //     }

    //     return view('main.show', compact('task'));
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tasks = Task::all();
        $task = Task::find($id);
        return view('handlers.edit', compact('task'))->with('tasks', $tasks);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $task = Task::find($id);
        $userInput=[
            'Task_Name'=>$request->Task_Name
        ];
        $task->update($userInput);
        return redirect()->route('tasks.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

}
