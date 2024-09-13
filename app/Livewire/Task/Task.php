<?php

namespace App\Livewire\Task;

use App\Models\Task as ModelsTask;
use Livewire\Component;

class Task extends Component
{
    public $title;
    public $description;
    public $assign_date;
    public $expire_date;

    public function tasksubmit(){
        $this->validate([
            'title' => 'required',
            'assign_date' => 'required',
            'expire_date' => 'required',
        ]);

        ModelsTask::create([
            'title' => $this->title,
            'description' => $this->description,
            'assign_date' => $this->assign_date,
            'expire_date' => $this->expire_date,
        ]);

        session()->flash('task_upload', 'Task successfully uploaded.');

        return back();
     }


    public function render()
    {
        return view('livewire.task.task');
    }
}
