<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function index()
    {
        $toDoList = ToDoList::all();
        return view('toDo.list', compact('toDoList'));
    }
    public function toDoCreate()
    {
        return view('toDo.create');
    }

    public function toDoSave(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $toDo = new ToDoList();
        $toDo->name = $request->input('name');
        $toDo->description = $request->input('description');
        $toDo->priority = $request->input('priority');
        $toDo->expiry_date = $request->input('expiry_date');
        $toDo->status = $request->input('status') ? 1 :0;
        $toDo->save();

        return redirect()->route('toDoList')->with('status', 'Task has been added.');
    }

    public function toDoEdit($id)
    {
        $task = ToDoList::find($id);
        return view('toDo.edit', compact('task'));
    }

    public function toDoUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $task = ToDoList::find($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->priority = $request->input('priority');
        $task->expiry_date = $request->input('expiry_date');
        $task->status = $request->input('status') ? 1 :0;
        $task->save();
        return redirect()->route('toDoList')->with('status', 'Task has been updated.');

    }

    public function changeStatus(Request $request)
    {
        $task = ToDoList::find($request->task_id);
        $task->status = $request->status ? 1 :0;
        $task->save();

        return response()->json(['success'=>'Status change successfully.']);

    }

    public function toDoDelete($id)
    {
        $task = ToDoList::find($id);
        $task->delete();
        return redirect()->route('toDoList');
    }

}
