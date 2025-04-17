<header class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8">
                    <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                    <circle cx="7" cy="17" r="2"></circle>
                    <circle cx="17" cy="17" r="2"></circle>
                </svg>
                <span class="ml-2 font-bold text-lg">GoRent</span>
            </a>
        </div>

        <!-- Navigation Links (Centered) -->
        @if(!Route::is('login') && !Route::is('register'))
        <nav class="hidden md:flex items-center justify-center space-x-8 absolute left-1/2 transform -translate-x-1/2">
            <a href="{{ route('home') }}" class="font-bold {{ request()->routeIs('home') ? 'text-black' : 'text-gray-700' }}">Home</a>
            <a href="{{ route('vehicles') }}" class="font-bold {{ request()->routeIs('vehicles') ? 'text-black' : 'text-gray-700' }}">Vehicles</a>
            <a href="{{ route('about') }}" class="font-bold {{ request()->routeIs('about') ? 'text-black' : 'text-gray-700' }}">About Us</a>
            @if (Auth::check() && Auth::user()->role == 'customer')
            <a href="{{ route('booking.index') }}" class="font-bold {{ request()->routeIs('booking') ? 'text-black' : 'text-gray-700' }}">Booking</a>
            @endif
            <a href="{{ route('contact') }}" class="font-bold {{ request()->routeIs('contact') ? 'text-black' : 'text-gray-700' }}">Contact Us</a>
        </nav>
        @endif

        <!-- Right Side -->
        <div class="flex items-center">
            @if(Route::has('login') && Route::currentRouteName() == 'register')
            <a href="{{ route('login') }}" class="font-bold text-gray-700 hover:text-black">
                LOGIN
            </a>
            @elseif(Route::has('register') && Route::currentRouteName() == 'login')
            <a href="{{ route('register') }}" class="font-bold text-gray-700 hover:text-black">
                REGISTER
            </a>
            @else
            @auth
            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    {{-- <span class="font-bold">{{ Auth::user()->admin->name }}</span> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                    <a href="{{ route('customer.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Bookings</a>
                    <div class="border-t border-gray-100 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            @else
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="font-bold text-gray-600 hover:text-black py-2">Login</a>
                <a href="{{ route('register') }}" class="font-bold bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Register</a>
            </div>
            @endauth

            <!-- Mobile menu button -->
            <button class="md:hidden ml-4" x-data="{ open: false }" @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>

                <!-- Mobile menu -->
                <div x-show="open" @click.away="open = false" class="absolute top-20 right-4 bg-white rounded-md shadow-lg py-2 mt-2 w-48 z-50" style="display: none;">
                    <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Home</a>
                    <a href="{{ route('vehicles') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Vehicles</a>
                    <a href="{{ route('about') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">About Us</a>
                    @if (Auth::check() && Auth::user()->role == 'customer')
                    <a href="{{ route('booking.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Booking</a>
                    @endif
                    <a href="{{ route('contact')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contact Us</a>
                </div>
            </button>
            @endif
        </div>
    </div>

    @if(isset($pageTitle))
    <div class="mt-4 border-b border-gray-200 pb-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pageTitle }}
        </h2>
    </div>
    @endif
</header>