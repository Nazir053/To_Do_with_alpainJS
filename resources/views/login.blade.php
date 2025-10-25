@extends('layouts.app')
@section('content')


<div class="w-full max-w-md">
        <div class="bg-white p-10 rounded-xl shadow-2xl">
            
            <header class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">
                    Welcome Back! 👋
                </h1>
                <p class="text-gray-600">
                    Sign in to manage your tasks.
                </p>
            </header>

            <form action="/login" method="POST" class="space-y-6">
            @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" required 
                           autocomplete="email" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder-gray-400"
                           placeholder="you@example.com">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required 
                           autocomplete="current-password"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm placeholder-gray-400"
                           placeholder="••••••••">
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox" 
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900 select-none">Remember me</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150">
                            Forgot Password?
                        </a>
                    </div>
                </div>
                
                <div>
                    <button type="submit" 
                            class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-md text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                        Log In
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm">
                <p class="text-gray-600">
                    Don't have an account? 
                    <a href="/signup" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150">
                        Sign Up
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection