<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class AssignTask extends Model
{
    use HasFactory;
    protected $guarded=[''];

    public function belonguser(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function belongtask(){
        return $this->belongsTo(Task::class,'task_id');
    }
}
