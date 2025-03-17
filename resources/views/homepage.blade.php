 @extends('layouts.app')

 @section('content')
 <!-- Features Section -->
 <section class="container mx-auto px-4 py-12">
     <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
         <!-- Availability Feature -->
         <div class="flex flex-col items-center text-center">
             <div class="mb-4">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12">
                     <circle cx="12" cy="12" r="10"></circle>
                     <polyline points="12 6 12 12 16 14"></polyline>
                 </svg>
             </div>
             <h3 class="text-lg font-semibold mb-2">Availability</h3>
             <p class="text-sm text-gray-600">Diam tincidunt facilisis erat et semper fermentum. Id ornicus quis.</p>
         </div>

         <!-- Comfort Feature -->
         <div class="flex flex-col items-center text-center">
             <div class="mb-4">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12">
                     <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                     <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                     <line x1="12" y1="22.08" x2="12" y2="12"></line>
                 </svg>
             </div>
             <h3 class="text-lg font-semibold mb-2">Comfort</h3>
             <p class="text-sm text-gray-600">Gravida auctor fermentum morbi vulputate in gravida curabitur convallis.</p>
         </div>

         <!-- Savings Feature -->
         <div class="flex flex-col items-center text-center">
             <div class="mb-4">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12">
                     <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                     <line x1="2" y1="10" x2="22" y2="10"></line>
                 </svg>
             </div>
             <h3 class="text-lg font-semibold mb-2">Savings</h3>
             <p class="text-sm text-gray-600">Pretium convallis id diam sed commodo vestibulum laoreet adipisci.</p>
         </div>
     </div>
 </section>

 <!-- Car Selection Section -->
 <section class="container mx-auto px-4 py-12">
     <div class="flex justify-between items-center mb-8">
         <h2 class="text-2xl font-bold">Choose the car that suits you</h2>
         <a href="{{ url('/vehicles') }}" class="flex items-center text-sm font-medium">
             View All
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 ml-1">
                 <path d="M5 12h14"></path>
                 <path d="m12 5 7 7-7 7"></path>
             </svg>
         </a>
     </div>

     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
         @foreach($randomVehicles as $suitsVehicle)
         <!-- Car 1 -->
         <div class="bg-gray-100 rounded-lg p-4">
             <div class="bg-white rounded-lg p-6 mb-4">
                 @if($suitsVehicle->image)
                 <img src="{{ asset('images/vehicles/' . $suitsVehicle->image) }}" alt="{{ $suitsVehicle->brand }}" class="mx-auto h-24 object-contain">
                 @else
                 <img src="/placeholder.svg?height=120&width=240" alt="{{ $suitsVehicle->brand }}" class="mx-auto h-24 object-contain">
                 @endif
             </div>
             <div class="flex justify-between items-center mb-4">
                 <div>
                     <h3 class="font-semibold">{{ $suitsVehicle->brand }}</h3>
                     <p class="text-sm text-gray-500">{{ $suitsVehicle->type }}</p>
                 </div>
                 <div class="text-right">
                     <p class="text-lg font-bold text-indigo-600">{{ $suitsVehicle->price }}</p>
                     <p class="text-xs text-gray-500">per day</p>
                 </div>
             </div>
             <div class="flex justify-between mb-4">
                 <div class="flex items-center text-xs text-gray-500">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                         <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                         <circle cx="7" cy="17" r="2"></circle>
                         <circle cx="17" cy="17" r="2"></circle>
                     </svg>
                     {{ ucfirst($suitsVehicle->condition) }}
                 </div>
                 <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                     {{ ucfirst($suitsVehicle->year) }}
                 </div>
                 <div class="flex items-center text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1">
                        <circle cx="13.5" cy="6.5" r="4"></circle>
                        <circle cx="19" cy="17" r="2"></circle>
                        <circle cx="6" cy="17" r="2"></circle>
                        <path d="M16 14h-5a2 2 0 0 0-1.95 1.55L8 19h8l-1.05-3.45A2 2 0 0 0 13 14Z"></path>
                    </svg>
                    <div 
                        class="w-3 h-3 rounded-full mr-1.5 border border-gray-300" style="background-color: {{ strtolower($suitsVehicle->color) }};">
                    </div>
                     {{ ucfirst($suitsVehicle->color) }}
                 </div>
             </div>
             <a href="{{ route('vehicles.details', $suitsVehicle->id) }}" class="block w-full py-2 text-center bg-indigo-600 text-white rounded-md font-medium">View Details</a>
         </div>
         @endforeach
     </div>
 </section>

 <!-- Facts Section -->
 <section class="bg-indigo-600 py-16 mt-12">
     <div class="container mx-auto px-4">
         <h2 class="text-2xl font-bold text-white text-center mb-8">Facts In Numbers</h2>
         <p class="text-white text-center mb-12 max-w-2xl mx-auto">Amet cras nec lectus. Faucibus ipsum eget lacinia nibh volutate ullamcorper in. Diam tincidunt tincidunt erat et semper fermentum.</p>

         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
             <div class="bg-white rounded-lg p-6 flex items-center">
                 <div class="bg-amber-100 p-3 rounded-lg mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                         <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C1.4 11.3 1 12.1 1 13v3c0 .6.4 1 1 1h2"></path>
                         <circle cx="7" cy="17" r="2"></circle>
                         <circle cx="17" cy="17" r="2"></circle>
                     </svg>
                 </div>
                 <div>
                     <p class="text-xl font-bold">540+</p>
                     <p class="text-sm text-gray-500">Cars</p>
                 </div>
             </div>

             <div class="bg-white rounded-lg p-6 flex items-center">
                 <div class="bg-amber-100 p-3 rounded-lg mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                     </svg>
                 </div>
                 <div>
                     <p class="text-xl font-bold">20k+</p>
                     <p class="text-sm text-gray-500">Customers</p>
                 </div>
             </div>

             <div class="bg-white rounded-lg p-6 flex items-center">
                 <div class="bg-amber-100 p-3 rounded-lg mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                         <path d="M12 2a10 10 0 1 0 10 10H12V2z"></path>
                         <path d="M20 12a8 8 0 1 0-16 0"></path>
                         <path d="M12 12v-8"></path>
                     </svg>
                 </div>
                 <div>
                     <p class="text-xl font-bold">25+</p>
                     <p class="text-sm text-gray-500">Years</p>
                 </div>
             </div>

             <div class="bg-white rounded-lg p-6 flex items-center">
                 <div class="bg-amber-100 p-3 rounded-lg mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-amber-500">
                         <circle cx="12" cy="12" r="10"></circle>
                         <polyline points="12 6 12 12 16 14"></polyline>
                     </svg>
                 </div>
                 <div>
                     <p class="text-xl font-bold">20m+</p>
                     <p class="text-sm text-gray-500">Miles</p>
                 </div>
             </div>
         </div>
     </div>
 </section>

 <!-- CTA Section -->
 <section class="bg-indigo-600 py-16 relative">
     <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
         <div class="md:w-1/2 mb-8 md:mb-0">
             <h2 class="text-2xl font-bold text-white mb-4">Enjoy every mile with adorable companionship.</h2>
             <p class="text-white mb-6">Amet cras nec lectus. Faucibus ipsum eget lacinia nibh volutate ullamcorper in. Diam tincidunt tincidunt erat.</p>

             <form class="flex">
                 <input type="text" placeholder="City" class="px-4 py-2 rounded-l-md w-full focus:outline-none">
                 <button type="submit" class="bg-amber-500 text-white px-4 py-2 rounded-r-md font-medium">Search</button>
             </form>
         </div>
         <div class="md:w-1/2 relative">
             <img src="/placeholder.svg?height=300&width=400" alt="Car silhouette" class="w-full opacity-50">
         </div>
     </div>
 </section>
 @endsection