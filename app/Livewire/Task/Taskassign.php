<?php

namespace App\Livewire\Task;

use App\Models\AssignTask;
use App\Models\User;
use Livewire\Component;

class Taskassign extends Component
{
    public $task;
    public $user_id;
    public $assign_time;

    public function taskassign($id){
        $this->validate([
            'user_id' => 'required',
            'assign_time' => 'required'
        ]);

        $user = User::where('id',$this->user_id)->first();
        $task = Task::where('id',$id)->first();

        $assign_task_exists = AssignTask::where('user_id',$this->user_id)
        ->where('task_id',$id)
        ->first();

        if(!$assign_task_exists){
            AssignTask::create([
                'task_title' => $task->name,
                'task_id' => $id,
                'user_id' => $this->user_id,
                'assign_date' => $this->assign_time,
                'created_at' => now(),
            ]);
            session()->flash('task_assign',"Task Assign to mr. $user->name");
        }else{
            session()->flash('task_assign_error',"Task already assign to this employee");
        }



    }

    public function render()
    {
        $employees = User::where('role','employee')->latest()->get();
        return view('livewire.task.taskassign',compact('employees'));
    }
}
