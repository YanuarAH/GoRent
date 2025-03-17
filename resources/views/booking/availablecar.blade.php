@extends('layouts.app')

@section('content')
    <div class="text-center max-w mx-auto px-4">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-center mb-8">Search Available Cars</h1>
        
        <!-- Search Form -->
        <div class="bg-indigo-600 rounded-lg p-6 shadow-lg">
            <h2 class="text-xl font-semibold text-white mb-6">Book your car</h2>
            
            <form action="vehicles.index" method="GET">
                <!-- Rental Date -->
                <div class="mb-4">
                    <input 
                        type="date" 
                        name="rental_date" 
                        class="w-full p-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300"
                        placeholder="Rental date"
                        required
                    >
                </div>
                
                <!-- Return Date -->
                <div class="mb-6">
                    <input 
                        type="date" 
                        name="return_date" 
                        class="w-full p-3 rounded-md bg-indigo-500 text-white placeholder-indigo-200 border border-indigo-400 focus:outline-none focus:border-indigo-300"
                        placeholder="Return date"
                        required
                    >
                </div>
                
                <!-- Search Button -->
            <div class="flex items-baseline justify-between">
                <a href="{{ route('show') }}" class="w-full py-3 px-4 bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-md transition duration-200 text-center !important">
                    Search now
                </a>
            </div>
            </form>
        </div>
    </div>
@endsection