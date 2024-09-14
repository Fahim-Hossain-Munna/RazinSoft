<?php

namespace App\Livewire\Task;

use App\Models\AssignTask;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mytask extends Component
{
    public $search;

    public function updateStatus($id){

        $task = AssignTask::where('id',$id)->first();

        if($task->status == 'pending'){
            AssignTask::find($task->id)->update([
                'status' => 'complete',
                'updated_at' => now(),
            ]);
        session()->flash('task_status', 'Task status mark complete.');

        }else{
            AssignTask::find($task->id)->update([
                'status' => 'pending',
                'updated_at' => now(),
            ]);
        session()->flash('task_status', 'Task status mark complete.');
        }

    }


    public function render()
    {

        $tasks = AssignTask::where('user_id',Auth::user()->id)
        ->where('status','pending')
        ->get();

        $tasks = AssignTask::where('task_title',"LIKE","%$this->search%")->get();


        return view('livewire.task.mytask',[
            'tasks' => $tasks,
        ]);
    }
}
