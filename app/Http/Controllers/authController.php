<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function signup(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string']
        ]);

        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>bcrypt($request->password)
        ]);
        auth::login($user);
        return redirect('/dashbord');


        
    }
}
