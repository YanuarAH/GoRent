<header class="bg-white shadow-sm z-10">
    <div class="flex items-center justify-between h-16 px-6">
        <div class="flex items-center">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="ml-4 text-xl font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>
        </div>
        
        <div class="flex items-center">
            <div class="relative" x-data="{ notificationsOpen: false }">
                <button @click="notificationsOpen = !notificationsOpen" class="p-2 text-gray-500 rounded-full hover:bg-gray-100 focus:outline-none">
                    <i class="fas fa-bell"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div x-show="notificationsOpen" @click.away="notificationsOpen = false" 
                     class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg py-2 z-20" style="display: none;">
                    <div class="px-4 py-2 border-b">
                        <p class="text-sm font-medium text-gray-700">Notifications</p>
                    </div>
                    <div class="max-h-64 overflow-y-auto">
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 border-b">
                            <div class="flex-shrink-0">
                                <i class="fas fa-car-side text-blue-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">New booking request</p>
                                <p class="text-xs text-gray-500">10 minutes ago</p>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100">
                            <div class="flex-shrink-0">
                                <i class="fas fa-user-plus text-green-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">New user registered</p>
                                <p class="text-xs text-gray-500">1 hour ago</p>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="block text-center text-sm font-medium text-blue-600 px-4 py-2 hover:underline">
                        View all notifications
                    </a>
                </div>
            </div>
            
            <div class="relative ml-4" x-data="{ profileOpen: false }">
                <button @click="profileOpen = !profileOpen" class="flex items-center focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-700">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700 hidden md:block">{{ Auth::user()->name ?? 'Admin User' }}</span>
                    <i class="fas fa-chevron-down ml-1 text-sm text-gray-400 hidden md:block"></i>
                </button>
                <div x-show="profileOpen" @click.away="profileOpen = false" 
                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-20" style="display: none;">
                    <div class="border-t border-gray-100"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();" 
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                    <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
