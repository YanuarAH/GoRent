@extends('layouts.admin')

@section('title', 'Notifications')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Notifications</h2>
        
        @if(Auth::user()->unreadNotificationsCount() > 0)
            <a href="{{ route('notifications.mark-all-read') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Mark all as read
            </a>
        @endif
    </div>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="divide-y divide-gray-200">
            @forelse($notifications as $notification)
                <div class="p-6 flex items-start {{ $notification->isRead() ? 'bg-white' : 'bg-blue-50' }}">
                    <div class="flex-shrink-0 mr-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center {{ $notification->isRead() ? 'bg-gray-100' : 'bg-blue-100' }}">
                            <i class="{{ $notification->getIconClass() }}"></i>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h3 class="text-lg font-medium text-gray-900">{{ $notification->title }}</h3>
                            <span class="text-sm text-gray-500">{{ $notification->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <p class="mt-1 text-gray-600">{{ $notification->message }}</p>
                        <div class="mt-3 flex space-x-3">
                            @if($notification->link)
                                <a href="{{ route('notifications.mark-as-read', $notification) }}" 
                                   class="text-sm text-blue-600 hover:text-blue-800">
                                    View details
                                </a>
                            @endif
                            
                            @if(!$notification->isRead())
                                <form action="{{ route('notifications.mark-as-read', $notification) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-800">
                                        Mark as read
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-6 text-center text-gray-500">
                    <i class="fas fa-bell text-gray-300 text-5xl mb-4"></i>
                    <p>You don't have any notifications yet.</p>
                </div>
            @endforelse
        </div>
    </div>
    
    <div class="mt-6">
        {{ $notifications->links() }}
    </div>
</div>
@endsection