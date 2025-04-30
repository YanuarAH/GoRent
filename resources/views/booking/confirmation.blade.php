@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-6 bg-green-50 border-b">
                <h1 class="text-2xl font-bold text-green-800">Reservation Confirmed!</h1>
                <p class="text-green-700">Your booking has been successfully completed.</p>
            </div>
            
            <!-- Payment Deadline Notice -->
            @if($rental->payment_status == 'pending')
            <div class="p-4 bg-yellow-50 border-b border-yellow-100">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="font-medium text-yellow-800">Payment Deadline: <span class="font-bold">{{ $rental->created_at->addHour()->format('M d, Y h:i A') }}</span></p>
                        <p class="text-sm text-yellow-700">Please complete your payment within 1 hour to confirm your reservation.</p>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4">Reservation Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Reservation ID</p>
                            <p class="font-medium">{{ $rental->id }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Status</p>
                            <p class="font-medium">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ ucfirst($rental->payment_status) }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Customer Name</p>
                            <p class="font-medium">{{ $rental->customer_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Phone Number</p>
                            <p class="font-medium">{{ $rental->customer_phone }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Pickup Date</p>
                            <p class="font-medium">{{ $rental->rental_date->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Return Date</p>
                            <p class="font-medium">{{ $rental->return_date->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4">Vehicle Information</h2>
                    
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 mb-4 md:mb-0 md:pr-6">
                            @if($rental->vehicle->image)
                                <img src="{{ asset('storage/vehicles/' . basename($rental->vehicle->image)) }}" alt="{{ $rental->vehicle->brand }}" class="w-full rounded-lg">
                            @else
                                <img src="/placeholder.svg?height=200&width=300" alt="{{ $rental->vehicle->brand }}" class="w-full rounded-lg">
                            @endif
                        </div>
                        
                        <div class="md:w-2/3">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $rental->vehicle->brand }}</h3>
                                    <p class="text-gray-600">{{ ucfirst($rental->vehicle->type) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold text-indigo-600">${{ $rental->vehicle->price }}</p>
                                    <p class="text-gray-600">per day</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-600">Condition</p>
                                    <p class="font-medium">{{ ucfirst($rental->vehicle->condition) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Year</p>
                                    <p class="font-medium">{{ $rental->vehicle->year }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Color</p>
                                    <p class="font-medium">{{ ucfirst($rental->vehicle->color) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">License Plate</p>
                                    <p class="font-medium">{{ $rental->vehicle->no_plat }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-4 mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-600">Duration:</span>
                        <span>{{ $rental->duration }} {{ Str::plural('day', $rental->duration) }}</span>
                    </div>
                    <div class="flex justify-between font-bold">
                        <span>Total Price:</span>
                        <span class="text-indigo-600">${{ number_format($rental->total_payment, 2) }}</span>
                    </div>
                </div>
                
                <!-- Payment Section -->
                @if($rental->payment_status == 'pending')
                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <h3 class="font-medium mb-4">Complete Your Payment</h3>
                    <p class="text-gray-600 mb-4">Please complete your payment to confirm your reservation. Your booking will be automatically cancelled if payment is not received within 1 hour.</p>
                    
                    <a href="{{ route('booking.payment', $rental->id) }}" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Proceed to Payment
                    </a>
                </div>
                @endif
                
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="font-medium mb-2">What's Next?</h3>
                    <p class="text-gray-600 mb-2">Our team will review your reservation and send you a confirmation email shortly.</p>
                    <p class="text-gray-600">Please bring your driver's license and ID card (NIK) when picking up the vehicle.</p>
                </div>
            </div>
        </div>
        
        <div class="flex justify-between">
            <a href="{{ route('customer.history') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                View My Bookings
            </a>
            
            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Return to Home
            </a>
        </div>
    </div>
</div>
@endsection
