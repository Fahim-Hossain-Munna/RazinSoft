<?php

namespace App\Livewire\Role;

use App\Models\User;
use Livewire\Component;

class Role extends Component
{

    public $user;
    public $role;

    public function roleassign(){

        $this->validate([
            'user' => 'required',
            'role' => 'required',
        ]);

        $user = User::find($this->user);

        if($user->permission_assign == false){
            if($this->role == 'assign'){
                $user->permission_assign = true;
                $user->save();
                session()->flash('permission_update','Permission Updated.');
                session()->flash('permission_table','New Task Assign.');
            }
        }else{
            session()->flash('permission_update_error','This Employee has already assign permission.');
        }


        if($user->permission_create == false){
            if($this->role == 'create'){
                $user->permission_create = true;
                $user->save();
                session()->flash('permission_update','Permission Updated.');
                session()->flash('permission_table','New Task Assign.');
            }
        }else{
            session()->flash('permission_update_error','This Employee has already assign permission.');
        }

    }

    public function removerole($role,$id){
        $user = User::find($id);

        if($role == 'assign'){
            $user->permission_assign = false;
                $user->save();
                session()->flash('permission_table','Permission Updated.');
        }

        if($role == 'create'){
            $user->permission_create = false;
                $user->save();
                session()->flash('permission_table','Permission Updated.');
        }
    }

    public function render()
    {
        $employees = User::where('role','employee')
        ->where(function($query) {
            $query->where('permission_create', 0)
                  ->orWhere('permission_assign', 0);
        })
        ->get();

        $permission_employees = User::where('role','employee')
        ->where(function($query) {
            $query->where('permission_create', 1)
                  ->orWhere('permission_assign', 1);
        })
        ->get();

        return view('livewire.role.role',compact('employees','permission_employees'));
    }
}
