<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyTaskController extends Controller
{
    public function index(){
        return view('dashboard.mytask.index');
    }
}
