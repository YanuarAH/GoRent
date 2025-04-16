@extends('layouts.app')

@section('content')
<div class="text-center max-w mx-auto px-4">
    <!-- Header -->
    <h1 class="text-3xl font-bold text-center mb-8">Search Available Cars</h1>

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        {{ session('error') }}
    </div>
    @endif

    <!-- Search Form -->
    <div class="bg-indigo-600 rounded-lg p-6 shadow-lg">
        <h2 class="text-xl font-semibold text-white mb-6">Book your car</h2>

        <form action="{{ route('booking.check-availability') }}" method="GET">
            <!-- Rental Date -->
            <div class="mb-4">
                <input type="date" id="rental_date" name="rental_date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    min="{{ date('Y-m-d') }}"
                    value="{{ old('rental_date', date('Y-m-d')) }}"
                    required onclick="this.showPicker()">
                @error('rental_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Return Date -->
            <div class="mb-6">
                <input type="date" id="return_date" name="return_date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    value="{{ old('return_date', date('Y-m-d', strtotime('+3 days'))) }}"
                    required onclick="this.showPicker()">
                @error('return_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Search Button -->
            <div class="flex items-baseline justify-between">
                <button type="submit" class="w-full py-3 px-4 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-md transition duration-200 text-center !important">
                    Search now
                </button>
            </div>
        </form>
    </div>
</div>
@endsection