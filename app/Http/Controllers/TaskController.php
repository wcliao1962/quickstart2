<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\TaskShipped;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index',[
            'tasks' => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $task=$request->user()->tasks()->create([
            'name' => $request->name,
        ]);


        Mail::to($request->user())
            ->cc($request->user())
            ->send(new TaskShipped($task));

        return redirect('/tasks');

    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }
}
