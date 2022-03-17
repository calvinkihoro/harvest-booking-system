
<div class=" container mx-auto py-12 min-height-screen">
    <div class="w-full mx-auto sm:px-6 lg:px-8">
        <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
        <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>manage Bookings</h1>
        <label class="flex items-center capitalize my-2">
            <h1 class="capitalize whitespace-nowrap mx-2">column to show</h1>
            <select class="block rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    wire:model.lazy="pagine" >
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
                <option value="10000">10000</option>
            </select>
        </label>
        </div>

        <div class="w-full overflow-y-auto flex flex-col mt-2 p-4">
            <div class="-my-2  sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
                    <div class="shadow border-b border-gray-200 sm:rounded-lg">
                        <table class=" divide-y divide-gray-200 w-5/6">
                            <thead class="bg-gray-50 w-full">
                            <tr class="w-full">
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Customer Name</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Email/Phone</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Booking Type</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Adult & Children</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">CheckIn / CheckOut</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">Check Status</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if(count($paginator)>0)
                                @foreach($paginator as $user)
                                    <tr class="w-full">
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{$user->fullname}}</div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="ml-4">
                                            <div class="text-sm text-gray-900">Email: <span class="text-gray-500">{{$user->email}}</span></div>
                                            <div class="text-sm text-gray-900">Mobile Number: <span class="text-gray-500">{{$user->phone}}</span></div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-green-800"> {{$user->type}} </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Adult Number:{{$user->adultsNo}}</div>
                                                    <div class="text-sm font-medium text-gray-900">Children:{{$user->childrenNo}}</div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">CheckIn:{{$user->checkin}}</div>
                                                    <div class="text-sm font-medium text-gray-900">CheckOut:{{$user->checkout}}</div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">CheckIn:<span class="text-blue-500">{{$user->status}}</span></div>
                                                    <div class="text-sm font-medium text-gray-900">Booked On:<span class="text-blue-500">{{$user->created_at->diffForHumans()}}</span></div>


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center px-4 py-20 text-blue-600">No Online Booking.</td>
                                </tr>
                            @endif
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>

                    {{--pagination--}}
                    <div class="border-b dark:border-gray-700 bg-gray-50 dark:bg-gray-800 px-10 py-2">
                        @if ($paginator->hasPages())
                            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>
                                <span>showing {{$pagine}} row per page</span>

                                <span>
                {{-- Next Page Link --}}
                                    @if ($paginator->hasMorePages())
                                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                                    @else
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                                    @endif
            </span>
                            </nav>
                        @endif
                    </div>
                    {{--end pagination--}}

                </div>
            </div>
        </div>



    </div>


</div>

