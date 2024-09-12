<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index(){
        $users = User::all();
        $today_logged_users = User::where('created_at', '>=', Carbon::now()->startOfDay())
        ->where('created_at', '<=', Carbon::now()->endOfDay())->get();
        return view('dashboard.home.index',compact('users','today_logged_users'));
    }
}
