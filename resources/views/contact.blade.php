@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <!-- Breadcrumb -->
        <div class="text-sm text-gray-600 mb-4">
            <a href="/" class="hover:text-indigo-600">Home</a> / <span class="text-gray-800 font-semibold">Contact Us</span>
        </div>

        <!-- Heading -->
        <h1 class="text-3xl font-bold text-center mb-8">Contact Us</h1>

        <!-- Contact Details -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <!-- Address -->
            <div class="flex flex-col items-center">
                <div class="bg-yellow-500 p-4 rounded-full">
                    <i class="fas fa-map-marker-alt text-white text-xl"></i>
                </div>
                <h2 class="text-lg font-semibold mt-4">Address</h2>
                <p class="text-gray-700">Kentingan Jl. Ir. Sutami No.36, Jebres, Surakarta</p>
            </div>

            <!-- Email -->
            <div class="flex flex-col items-center">
                <div class="bg-yellow-500 p-4 rounded-full">
                    <i class="fas fa-envelope text-white text-xl"></i>
                </div>
                <h2 class="text-lg font-semibold mt-4">Email</h2>
                <p class="text-gray-700">melonpea12@gmail.com</p>
            </div>

            <!-- Phone -->
            <div class="flex flex-col items-center">
                <div class="bg-yellow-500 p-4 rounded-full">
                    <i class="fas fa-phone text-white text-xl"></i>
                </div>
                <h2 class="text-lg font-semibold mt-4">Phone</h2>
                <p class="text-gray-700">081999999999</p>
            </div>

            <!-- Opening Hours -->
            <div class="flex flex-col items-center">
                <div class="bg-yellow-500 p-4 rounded-full">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
                <h2 class="text-lg font-semibold mt-4">Opening Hours</h2>
                <p class="text-gray-700">Sun-Mon: 10am - 10pm</p>
            </div>
        </div>
    </div>
@endsection
