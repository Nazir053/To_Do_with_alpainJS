<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function showSignup(){
        return view('signup');
    }
    public function login() {
        echo "Login form submitted";
    }
    public function signup() {
        echo "Signup form submitted";
    }
}
