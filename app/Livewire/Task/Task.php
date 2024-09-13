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
    public $hi;

    // for clear all field
    public function clearForm(){
        $this->title = '';
        $this->description = '';
        $this->assign_date = '';
        $this->expire_date = '';
    }

    // for status change
    public function updateStatus($id){
       $task = ModelsTask::where('id',$id)->first();

       if($task->status == 'pending'){
        ModelsTask::find($task->id)->update([
            'status' => 'complete',
            'updated_at' => now(),
        ]);
        session()->flash('task_status', 'Task status mark complete.');
       }else{
        ModelsTask::find($task->id)->update([
            'status' => 'pending',
            'updated_at' => now(),
        ]);
        session()->flash('task_status', 'Task status mark pending.');
       }

    }

    // for task submit

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
        $this->clearForm();
        return back();
     }


     public function loadTask($id){
        $task = ModelsTask::find($id);
        $this->title = $task->title;
        $this->description = $task->description;
        $this->assign_date = $task->assign_date;
        $this->expire_date = $task->expire_date;

        $this->dispatch('openModal', $task->id);
     }

     public function taskedit(){

     }


    // for task delete
     public function destroy($id){
        ModelsTask::findOrFail($id)->delete();
        session()->flash('task_status', 'Task successfully Delete.');
     }


    public function render()
    {
        $tasks = ModelsTask::latest()->get();
        return view('livewire.task.task',compact('tasks'));
    }
}
