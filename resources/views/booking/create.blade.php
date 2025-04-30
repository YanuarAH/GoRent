@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="inline-flex items-center text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                <path d="M19 12H5"></path>
                <path d="M12 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Complete Your Booking</h1>

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-6 bg-gray-50 border-b">
                <h2 class="text-xl font-semibold">Vehicle Information</h2>
            </div>

            <div class="p-6 flex flex-col md:flex-row">
                <div class="md:w-1/3 mb-4 md:mb-0 md:pr-6">
                    @if($vehicle->image)
                    <img src="{{ asset('storage/vehicles/' . basename($vehicle->image)) }}" alt="{{ $vehicle->brand }}" class="w-full rounded-lg">
                    @else
                    <img src="/placeholder.svg?height=200&width=300" alt="{{ $vehicle->brand }}" class="w-full rounded-lg">
                    @endif
                </div>

                <div class="md:w-2/3">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-xl font-bold">{{ $vehicle->brand }}</h3>
                            <p class="text-gray-600">{{ ucfirst($vehicle->type) }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-indigo-600">${{ $vehicle->price }}</p>
                            <p class="text-gray-600">per day</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Condition</p>
                            <p class="font-medium">{{ ucfirst($vehicle->condition) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Year</p>
                            <p class="font-medium">{{ $vehicle->year }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Color</p>
                            <p class="font-medium">{{ ucfirst($vehicle->color) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">License Plate</p>
                            <p class="font-medium">{{ $vehicle->no_plat }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Rental Period:</span>
                            <span>{{ \Carbon\Carbon::parse($rental_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($return_date)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Duration:</span>
                            <span>{{ $rental_duration }} {{ Str::plural('day', $rental_duration) }}</span>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span>Total Price:</span>
                            <span class="text-indigo-600">${{ number_format($total_payment, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">

            <div class="p-6">
                <form action="{{ route('booking.store') }}" method="POST" x-bind:class="{ 'opacity-50 pointer-events-none': expired }">
                    @csrf

                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                    <input type="hidden" name="rental_date" value="{{ $rental_date }}">
                    <input type="hidden" name="return_date" value="{{ $return_date }}">
                    <input type="hidden" name="booking_id" value="{{ $booking_id ?? '' }}">
                    <input type="hidden" name="booking_start_time" value="{{ $booking_start_time ?? time() }}">
                    <input type="hidden" name="total_payment" value="{{ $total_payment }}">

                    <!-- Customer Information Section -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-4">Customer Information</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    value="{{ old('name', $customer ? $customer->name : '') }}"
                                    required
                                    x-bind:disabled="expired">
                                @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">ID Number (NIK)</label>
                                <input type="text" id="nik" name="nik"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    value="{{ old('nik', $customer ? $customer->nik : '') }}"
                                    required
                                    x-bind:disabled="expired">
                                @error('nik')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="text" id="phone" name="phone"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    value="{{ old('phone', $customer ? $customer->phone : '') }}"
                                    required
                                    x-bind:disabled="expired">
                                @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                <select id="gender" name="gender"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required
                                    x-bind:disabled="expired">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ (old('gender', $customer ? $customer->gender : '') == 'male') ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ (old('gender', $customer ? $customer->gender : '') == 'female') ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                <textarea id="address" name="address" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    required
                                    x-bind:disabled="expired">{{ old('address', $customer ? $customer->address : '') }}</textarea>
                                @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            @auth
                            <div class="flex items-center">
                                <input id="update_profile" name="update_profile" type="checkbox"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                    x-bind:disabled="expired">
                                <label for="update_profile" class="ml-2 block text-sm text-gray-700">
                                    Update my profile with this information
                                </label>
                            </div>
                            @endauth
                        </div>
                    </div>

                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                    x-bind:disabled="expired">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-medium text-gray-700">I agree to the rental terms and conditions</label>
                                <p class="text-gray-500">By checking this box, you agree to our <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms of Service</a> and <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>.</p>
                            </div>
                        </div>
                        @error('terms')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            x-bind:disabled="expired" x-show="!expired">
                            Complete Reservation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection