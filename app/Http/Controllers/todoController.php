<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todoController extends Controller
{
    public function show_all() {
        return view('todos');
    }
    public function show_dashbord() {
        return view('dashbord');
    }
}
