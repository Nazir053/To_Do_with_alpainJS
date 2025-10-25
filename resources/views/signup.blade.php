@extends('layouts.app')
@section('content')

    <div class="w-full max-w-md p-6">
        
        <header class="mb-10 text-center">
            <h1 class="text-4xl font-light text-gray-900 mb-2 tracking-tight">
                Get Started
            </h1>
            <p class="text-gray-500 font-light">
                Join to create and manage your tasks.
            </p>
        </header>

        <form action="/signup" method="POST" class="space-y-6">
        @csrf

            <div>
                <label for="name" class="block text-xs uppercase tracking-wider font-medium text-gray-600 mb-1">Full Name</label>
                <input type="text" id="name" name="name" required 
                       autocomplete="name" 
                       class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none minimal-input text-sm"
                       placeholder="e.g., Jane Doe">
            </div>

            <div>
                <label for="email" class="block text-xs uppercase tracking-wider font-medium text-gray-600 mb-1">Email</label>
                <input type="email" id="email" name="email" required 
                       autocomplete="email" 
                       class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none minimal-input text-sm"
                       placeholder="you@example.com">
            </div>
            
            <div>
                <label for="password" class="block text-xs uppercase tracking-wider font-medium text-gray-600 mb-1">Password</label>
                <input type="password" id="password" name="password" required 
                       autocomplete="new-password"
                       class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none minimal-input text-sm"
                       placeholder="••••••••">
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs uppercase tracking-wider font-medium text-gray-600 mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required 
                       autocomplete="new-password"
                       class="mt-1 block w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none minimal-input text-sm"
                       placeholder="••••••••">
            </div>
            
            <div class="pt-2">
                <button type="submit" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-semibold text-white bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition duration-150">
                    Create Account
                </button>
            </div>
        </form>

        <div class="mt-8 text-center text-sm">
            <p class="text-gray-500">
                Already have an account? 
                <a href="/login" class="font-medium text-blue-600 hover:text-blue-500 transition duration-150">
                    Log In
                </a>
            </p>
        </div>
    </div>

@endsection('content')
