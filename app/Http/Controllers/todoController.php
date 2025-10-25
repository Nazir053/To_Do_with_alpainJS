<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todoController extends Controller
{
    public function show() {
        return view('todos');
    }
}
