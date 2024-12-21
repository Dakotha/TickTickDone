<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        if ($request->has('priority') && $request->priority != '') {
            $query->where('priority', $request->priority);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('due_date') && $request->due_date != null) {
            $query->whereDate('due_date', $request->due_date);
        }

        $query->orderBy('created_at', 'desc')->get();

        $tasks = $query->paginate(6);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'required|date|after:today',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $histories = TaskHistory::where('task_id', $task->id)->get();

        return view('tasks.show', compact('task', 'histories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|max:255',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'required|date|after:today',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function history(Task $task)
    {
        return view('tasks.history', [
            'histories' => TaskHistory::all()
        ]);
    }

    public function share(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $task->generateShareToken();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function shared($token)
    {
        $task = Task::where('share_token', $token)->first();

        if (!$task || !$task->isTokenValid()) {
            abort(404, 'This link is invalid or has expired.');
        }

        return view('tasks.shared', compact('task'));
    }
}
