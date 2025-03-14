@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center pt-6 pb-12">
    <h1 class="text-4xl font-bold mb-12">Register</h1>
    
    <form method="POST" action="{{ route('register') }}" class="w-full max-w-md space-y-6">
        @csrf

        <!-- Name -->
        <div class="relative">
            <input id="name" 
                class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" 
                type="text" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Name" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="relative">
            <input id="email" 
                class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autocomplete="username"
                placeholder="Email" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <input id="password" 
                class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" 
                type="password" 
                name="password" 
                required 
                autocomplete="new-password"
                placeholder="Password" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <input id="password_confirmation" 
                class="w-full px-4 py-3 bg-gray-100 border border-gray-200 rounded-md pr-10 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" 
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password"
                placeholder="Re-Password" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                class="w-5 h-5 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-center mt-6">
                <x-primary-button class="w-auto px-20 py-2 rounded-md mt-6">
                    Register
                </x-primary-button>
        </div>

        <div class="text-center mt-4">
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>
@endsection

