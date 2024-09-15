<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AssignTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        $today_logged_users = User::where('created_at', '>=', Carbon::now()->startOfDay())
        ->where('created_at', '<=', Carbon::now()->endOfDay())->get();

        $employees = User::where('role','employee')->where('id','!=',Auth::user()->id)->paginate(5);
        $tasksAssign = AssignTask::where('status','pending')->latest()->paginate(5);

        return view('dashboard.home.index',compact('users','today_logged_users','employees','tasksAssign'));
    }

    public function search_employee(Request $request){
        $users = User::all();
        $today_logged_users = User::where('created_at', '>=', Carbon::now()->startOfDay())
        ->where('created_at', '<=', Carbon::now()->endOfDay())->get();
        $tasksAssign = AssignTask::where('status','pending')->latest()->paginate(5);
        $employees = User::where('name',"LIKE","%$request->search%")->paginate(5);
        return view('dashboard.home.index',compact('users','today_logged_users','employees','tasksAssign'));
    }
}
