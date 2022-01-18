<?php

namespace App\Observers;

use App\Models\TaskLog;
use App\Models\ToDoList;
use Illuminate\Support\Facades\Auth;

class TaskObserver
{
    /**
     * Handle the ToDoList "created" event.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return void
     */
    public function created(ToDoList $toDoList)
    {
        $taskLog = new TaskLog();
        $taskLog->user_id = Auth::user()->id;
        $taskLog->action  = "$toDoList->name created";
        $taskLog->task_id = $toDoList->id;
        $taskLog->save();
    }

    /**
     * Handle the ToDoList "updated" event.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return void
     */
    public function updated(ToDoList $toDoList)
    {
        $taskLog = new TaskLog();
        $taskLog->user_id = Auth::user()->id;
        $taskLog->action  = "$toDoList->name updated";
        $taskLog->task_id = $toDoList->id;
        $taskLog->save();
    }

    /**
     * Handle the ToDoList "deleted" event.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return void
     */
    public function deleted(ToDoList $toDoList)
    {
        $taskLog = new TaskLog();
        $taskLog->user_id = Auth::user()->id;
        $taskLog->action  = "$toDoList->name deleted";
        $taskLog->task_id = $toDoList->id;
        $taskLog->save();
    }

    /**
     * Handle the ToDoList "restored" event.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return void
     */
    public function restored(ToDoList $toDoList)
    {
        //
    }

    /**
     * Handle the ToDoList "force deleted" event.
     *
     * @param  \App\Models\ToDoList  $toDoList
     * @return void
     */
    public function forceDeleted(ToDoList $toDoList)
    {
        //
    }
}
