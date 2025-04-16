@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">My Bookings</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    @if(count($rentals) > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Vehicle
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dates
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Payment Deadline
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($rentals as $rental)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if($rental->vehicle->image)
                                            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('images/vehicles/' . $rental->vehicle->image) }}" alt="{{ $rental->vehicle->brand }}">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-gray-400">
                                                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                                                    <circle cx="7" cy="17" r="2"></circle>
                                                    <circle cx="17" cy="17" r="2"></circle>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $rental->vehicle->brand }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ ucfirst($rental->vehicle->type) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $rental->rental_date->format('M d, Y') }}</div>
                                <div class="text-sm text-gray-500">to {{ $rental->return_date->format('M d, Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${{ number_format($rental->total_payment, 2) }}</div>
                                <div class="text-sm text-gray-500">{{ $rental->duration }} {{ Str::plural('day', $rental->duration) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $rental->status_color }}">
                                    {{ ucfirst($rental->effective_status) }}
                                </span>
                                
                                @if($rental->effective_status == 'confirmed' && $rental->rental_date->isPast() && $rental->return_date->isFuture())
                                    <span class="block mt-1 text-xs text-green-600">Active Rental</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($rental->payment_status == 'pending')
                                    <div class="text-sm text-gray-900">
                                        {{ $rental->created_at->addHour()->format('M d, Y h:i A') }}
                                    </div>
                                    @if($rental->is_expired)
                                        <div class="text-xs text-red-600">Expired</div>
                                    @else
                                        <div class="text-xs text-gray-500">
                                            {{ now()->diffForHumans($rental->created_at->addHour(), true) }} left
                                        </div>
                                    @endif
                                @else
                                    <div class="text-sm text-gray-500">-</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('customer.history-detail', $rental->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    View Details
                                </a>
                                
                                @if($rental->payment_status == 'pending' && !$rental->is_expired)
                                    <a href="{{ route('booking.payment', $rental->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                        Pay Now
                                    </a>
                                @endif
                                
                                @if($rental->can_be_cancelled)
                                    <form action="{{ route('customer.cancel-booking', $rental->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                            Cancel
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-16 h-16 mx-auto text-gray-400 mb-4">
                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                <circle cx="7" cy="17" r="2"></circle>
                <circle cx="17" cy="17" r="2"></circle>
            </svg>
            <h2 class="text-xl font-semibold mb-2">No Bookings Found</h2>
            <p class="text-gray-600 mb-6">You haven't made any vehicle bookings yet.</p>
            <a href="{{ route('booking.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Book a Vehicle
            </a>
        </div>
    @endif
</div>
@endsection
