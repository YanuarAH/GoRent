@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('booking.confirmation', $rental->id) }}" class="inline-flex items-center text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                    <path d="M19 12H5"></path>
                    <path d="M12 19l-7-7 7-7"></path>
                </svg>
                Back to Booking Details
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="p-6 bg-indigo-50 border-b">
                <h1 class="text-2xl font-bold">Complete Your Payment</h1>
                <p class="text-gray-600">Booking ID: #{{ $rental->id }}</p>
            </div>
            
            <!-- Payment Deadline Notice -->
            @php
                $deadline = $rental->created_at->addHour();
                $currentTime = now();
                $remainingSeconds = max(0, $deadline->timestamp - $currentTime->timestamp);
                $hours = floor($remainingSeconds / 3600);
                $minutes = floor(($remainingSeconds % 3600) / 60);
                $seconds = $remainingSeconds % 60;
                $timeLeft = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                $isExpired = $remainingSeconds <= 0;
            @endphp

            <div class="p-4 bg-yellow-50 border-b border-yellow-100" 
                x-data="{ 
                    hours: {{ $hours }},
                    minutes: {{ $minutes }}, 
                    seconds: {{ $seconds }}, 
                    expired: {{ $isExpired ? 'true' : 'false' }},
                    timer: null,
                    init() {
                        if (this.expired) return;
                        
                        this.timer = setInterval(() => {
                            if (this.seconds > 0) {
                                this.seconds--;
                            } else if (this.minutes > 0) {
                                this.minutes--;
                                this.seconds = 59;
                            } else if (this.hours > 0) {
                                this.hours--;
                                this.minutes = 59;
                                this.seconds = 59;
                            } else {
                                this.expired = true;
                                clearInterval(this.timer);
                            }
                        }, 1000);
                    },
                    formattedTime() {
                        return `${this.hours.toString().padStart(2, '0')}:${this.minutes.toString().padStart(2, '0')}:${this.seconds.toString().padStart(2, '0')}`;
                    }
                }">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-medium">Payment Deadline:</span>
                    </div>
                    <div x-show="!expired" class="font-bold" x-text="formattedTime()"></div>
                    <div x-show="expired" class="font-bold text-red-600">Time expired!</div>
                </div>
                <div x-show="expired" class="mt-2">
                    <p class="text-red-600">Your booking session has expired. Please start a new booking.</p>
                    <a href="{{ route('booking.index') }}" class="inline-block mt-2 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Start New Booking
                    </a>
                </div>
            </div>
            
            <!-- Rest of the payment page remains unchanged -->
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                    
                    <div class="flex flex-col md:flex-row mb-6">
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
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-600">Pickup Date</p>
                                    <p class="font-medium">{{ $rental->rental_date->format('M d, Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Return Date</p>
                                    <p class="font-medium">{{ $rental->return_date->format('M d, Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Duration</p>
                                    <p class="font-medium">{{ $rental->duration }} {{ Str::plural('day', $rental->duration) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Daily Rate</p>
                                    <p class="font-medium">${{ $rental->vehicle->price }}/day</p>
                                </div>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between font-bold">
                                    <span>Total Amount:</span>
                                    <span class="text-indigo-600">${{ number_format($rental->total_payment, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Payment Method</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="border rounded-lg p-4 cursor-pointer hover:border-indigo-500 transition-colors">
                            <div class="flex items-center mb-2">
                                <input type="radio" id="credit_card" name="payment_method" value="credit_card" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300" checked>
                                <label for="credit_card" class="ml-2 block text-sm font-medium text-gray-700">Credit Card</label>
                            </div>
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-400">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="border rounded-lg p-4 cursor-pointer hover:border-indigo-500 transition-colors">
                            <div class="flex items-center mb-2">
                                <input type="radio" id="paypal" name="payment_method" value="paypal" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <label for="paypal" class="ml-2 block text-sm font-medium text-gray-700">PayPal</label>
                            </div>
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-400">
                                    <path d="M7 11l5-5 5 5"></path>
                                    <path d="M12 6v12"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="border rounded-lg p-4 cursor-pointer hover:border-indigo-500 transition-colors">
                            <div class="flex items-center mb-2">
                                <input type="radio" id="bank_transfer" name="payment_method" value="bank_transfer" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                <label for="bank_transfer" class="ml-2 block text-sm font-medium text-gray-700">Bank Transfer</label>
                            </div>
                            <div class="flex justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-400">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Credit Card Form (shown by default) -->
                    <div id="credit_card_form" class="border rounded-lg p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="md:col-span-2">
                                <label for="card_number" class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                                <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="123" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="card_holder" class="block text-sm font-medium text-gray-700 mb-1">Card Holder Name</label>
                                <input type="text" id="card_holder" name="card_holder" placeholder="John Doe" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <form action="{{ route('booking.process-payment', $rental->id) }}" method="POST" x-bind:class="{ 'opacity-50 pointer-events-none': expired }">
                        @csrf
                        <input type="hidden" name="payment_method" value="credit_card">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            x-bind:disabled="expired">
                            Pay Now ${{ number_format($rental->total_payment, 2) }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
