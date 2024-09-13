<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Taskedit extends Component
{
    public $task;
    public $title;
    public $description;
    public $assign_date;
    public $expire_date;

    public function mount(){
        $this->title = $this->task->title;
        $this->description = $this->task->description;
        $this->assign_date = $this->task->assign_date;
        $this->expire_date = $this->task->expire_date;
    }

    // for clear all field
    public function clearForm(){
        $this->title = '';
        $this->description = '';
        $this->assign_date = '';
        $this->expire_date = '';
    }

    public function taskupdate($id){
        $task = Task::find($id);

        $this->validate([
            'title' => 'required',
            'assign_date' => 'required',
            'expire_date' => 'required',
        ]);


            $task->title = $this->title;
            $task->description = $this->description;
            $task->assign_date = $this->assign_date;
            $task->expire_date = $this->expire_date;

            $task->save();

            session()->flash('task_update', 'Task successfully Updated.');

    }


    public function render()
    {
        return view('livewire.task.taskedit');
    }
}
