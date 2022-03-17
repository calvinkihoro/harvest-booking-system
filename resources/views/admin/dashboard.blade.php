<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-xl text-gray-800 text-center leading-tight">
            Welcome <span class="italic text-blue-500 capitalize">{{Auth::user()->fname}}</span> to {{Auth::user()->role}} control panel
        </h2>
    </x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            All Operations
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
{{--            new booking--}}
            <a href="{{route('clientDATA')}}" >
            <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Make Booking
                    </p>
                </div>
            </div>
            </a>

            <!-- Card -->
{{--            manage online booking--}}
            <a href="{{route('onlineBooking')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-gray-500 bg-red-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Manage Online Bookings
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->

{{--            room registrations--}}
            <a href="{{route('rooms')}}">
            <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                       Register Room
                    </p>
                </div>
            </div>
            </a>
            <!-- Card -->

            <!-- Card -->
            <a href="{{route('staff')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-blue-400 rounded-full dark:text-blue-100 dark:bg-orange-500">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"  >
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Manage Staff Account
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->

            <!-- Card -->
            <a href="{{route('accounting')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-red-500 rounded-full dark:text-blue-100 dark:bg-orange-500">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Money In / <span class="text-blue-300">Money Out</span>
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->

            <a href="{{route('users')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-green-500 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Manage System Users
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->

            <!-- Card -->
            <a href="{{route('bill')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-orange-500 rounded-full dark:text-blue-100 dark:bg-orange-500">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Manage <span class="text-blue-300">Orders</span>
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->

            <!-- Card -->
            <a href="{{route('stock')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-red-400 rounded-full">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"  >
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Manage Stoke
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->

            <a href="{{route('generateReports')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-orange-200 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Generate Reports
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->


            <!-- Card -->

            <a href="{{route('blogPosts')}}" >
                <div class="flex items-center p-4 bg-white rounded-lg hover:shadow-xl shadow-xs transition ease-in-out duration-75">
                    <div class="p-3 mr-4 text-white bg-red-500 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                           Make Blog Post
                        </p>
                    </div>
                </div>
            </a>
            <!-- Card -->


        </div>

        <!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
          Quick Links.
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 h-[300px] overflow-y-auto">
                <h4 class="mb-4 font-semibold text-gray-800 text-center dark:text-gray-300">
                    Rooms Room details
                </h4>
                <div class="">
                    @php
                    $rooms=\App\Models\room::get();
                    $sno=1;
                    @endphp
                    @if(count($rooms)>0):
                    @foreach($rooms as $room)
                        <p class="px-2 py-1">{{$sno}}:   Room Number:<span class="text-gray-500">{{$room->room_no}}</span> Phone: <span class="text-green-500">{{$room->phone}} <span class="text-black">Status:</span> <span class="text-orange-500">{{$room->bookingStatus}}</span></p>
                       <hr/>
                        @php $sno++; @endphp
                        @endforeach
                    @else
                      <p class="text-center text-red-500">No room Added</p>
                    @endif

                </div>

                <canvas id="pie">


                </canvas>
            </div>
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 text-center font-semibold text-gray-800 dark:text-gray-300">
                   Money In / Money Out
                </h4>
                <canvas id="line"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Organic</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Paid</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts -->
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Charts
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Revenue
                </h4>
                <canvas id="pie"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                        <span>Shirts</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Shoes</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Bags</span>
                    </div>
                </div>
            </div>
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Traffic
                </h4>
                <canvas id="line"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <!-- Chart legend -->
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                        <span>Organic</span>
                    </div>
                    <div class="flex items-center">
                        <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                        <span>Paid</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
