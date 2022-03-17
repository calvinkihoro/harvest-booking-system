 <div class="py-12 min-height-screen overflow-y-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
                <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>manage rooms</h1>
                <label class="flex items-center capitalize my-2">
                    <h1 class="capitalize whitespace-nowrap mx-2">column to show</h1>
                    <select class="block rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            wire:model.lazy="pagine">
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
                <x-jet-button class="my-2" wire:click="showCreateModel1">{{('Add new room')}}</x-jet-button>

            </div>
            <div class="flex flex-col mt-2">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @if(session()->has('message'))
                                <h1 class="text-center text-blue-500 my-4">{{session('message')}}</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Room Number</th>
                            <th class="px-4 py-3">Room Details</th>
                            <th class="px-4 py-3">Price<span class="text-[10px] text-blue-500"> /night</span></th>
                            <th class="px-4 py-3">Status / Room phone</th>
                            <th class="px-4 py-3">Last Booking</th>
                            <th class="px-4 py-3">Admin Operations</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if(count($rooms)===0)
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <td colspan="6" class="text-center px-4 py-20 text-blue-600">No Room inserted (Click Button to add new room)</td>
                            </tr>

                        @else
                            @foreach ($paginator as $room)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">

                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                               <img class="object-cover w-[50px] h-[50px] rounded-full border-2 border-gray-400 shadow-lg" src="{{url('storage/roomimages/'.$room->images[0])}}" alt="image"  />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold"><span class="text-blue-500 font-normal">Room No:</span> {{$room->room_no}}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    <span class="text-blue-500 font-normal">Room Type: </span>{{$room->roomType}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <div class="" style="max-width:150px; overflow:hidden;">
                                        {{$room->description}}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{number_format($room->price)}}/=
                                    </td>
                                    <td class="px-4 py-3 text-xs flex flex-col">
                                <span class="px-4 py-1 mb-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Booking Status:<span class="text-red-500"> {{$room->bookingStatus}}</span>
                                </span> <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-300 rounded-full dark:bg-green-700 dark:text-green-100">
                                            Room Phone: <span class="text-gray-500"> {{$room->phone}}</span>
                                </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{$room->updated_at->diffForHumans()}}
                                    </td>
                                    <td>
                                       <button wire:click="showUpdate({{$room->id}})" class="text-indigo-600 hover:text-indigo-900 mx-2">Edit</button>
                                       <button wire:click="delete({{$room->id}})" class="text-red-600 hover:text-red-900 mx-2">Delete</button>

                                    </td>
                                </tr>
                            @endforeach
                        @endif

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


{{--model my model--}}
            <x-jet-dialog-modal wire:model="createModel1">

                <x-slot name="title" >
                    <h2 class="mt-2 p-4  text-center text-blue-400">Add New Room</h2>
                </x-slot>
                <x-slot name="content">
                    <div class="flex items-center">
                        <div class="flex-1 max-w-4xl mx-auto overflow-hidden">
                            <div class="overflow-y-auto">
                                <div class="flex items-center justify-center p-2 sm:p-4">
                                    <div class="w-full">
                                        <x-jet-validation-errors class="mb-4" />

                                        @if (session('status'))
                                            <div class="mb-4 text-sm font-medium text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                                                    @error('images.*') <span class="text-red-700 text-center">{{ $message }}</span> @enderror
                                        <div class="flex flex-col w-full">
                                        <form  wire:submit.prevent="submit"  enctype="multipart/form-data">
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Room Number</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Room Number" type="text" wire:model.lazy="room_no" name="roomNo" id="roomNo" value="{{old('roomNo')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Phone Number" type="text" wire:model.lazy="phone" name="phone" id="phone" value="{{old('phone')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Price (per day)</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Room Price per day" type="number" wire:model.lazy="price" name="price" id="price" value="{{old('price')}}"  autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Room Type
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="roomType" name="roomType" id="roomType" >
                                                        <option value="">choose room type</option>
                                                        <option value="Single Self">Single Self</option>
                                                        <option value="Full Suit">Full Suit</option>
                                                        <option value="Normal Hall">Normal Conference Hall</option>
                                                        <option value="VIP Hall">VIP Conference Hall</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm  mx-2  flex-1">
                                                    <span class="text-gray-700 dark:text-gray-400">Room Pictures</span>
                                                    <input class="block w-full rounded-sm mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                           type="file" wire:model="images" name="images" id="images" multiple autofocus/>
                                                </label>
                                                <label class="block text-sm mx-2 flex-1">
                                                    <span class="text-gray-700 dark:text-gray-400">Room Description</span>
                                                    <textarea
                                                        class="w-full py-1.5 px-3 form-control block rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                        rows="3" placeholder="Describe the room" wire:model.lazy="description" name="description" id="description"  autofocus
                                                    ></textarea>
                                                </label>
                                                <label class="block text-sm mx-2  flex-1">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Room Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="roomStatus" name="roomStatus" id="roomStatus" >
                                                        <option value="free">Free</option>
                                                        <option value="private">Private</option>
                                                        <option value="booked">booked</option>
                                                        <option value="maintanance">Under Maintanance</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="flex flex-row md:flex-row my-6  w-full">
                                                <div wire:loading wire:target="images" class="text-gray-700 text-center">Loading images...</div>
                                                @if ($images)
                                                    <h1>Photo Preview:</h1>

                                                    <div class="flex flex-col md:flex-row mt-2 w-full bg-white shadow-md p-4">


                                                        @foreach ($images as $images)

                                                            <div class="block text-sm mx-2">

                                                                <img class="object-contain rounded-sm h-20 w-20 border-2 border-blue-900 shadow-lg " src="{{ $images->temporaryUrl() }}">
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                @endif
                                            </div>
                                            <x-jet-button class="w-full mx-auto">
                                                <p class="text-center w-full text-white"> submit</p></x-jet-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

        </x-slot>
        <x-slot name="footer">
             <x-jet-button class="bg-green-800 mx-auto" wire:click="clear">clear form</x-jet-button>
             <x-jet-button class="bg-red-800 mx-auto" wire:click="cancel">cancel</x-jet-button>
        </x-slot>
        </x-jet-dialog-modal>
{{--models is good--}}

            {{--model my Update model--}}
            <x-jet-dialog-modal wire:model="updateModel1">

                <x-slot name="title" >
                    <h2 class="mt-2 p-4text-center text-blue-400">Upadate room number:<span class="text-gray-500">{{$room_no}}</span></h2>
                </x-slot>
                <x-slot name="content">
                    <div class="flex items-center">
                        <div class="flex-1 max-w-4xl mx-auto overflow-hidden">
                            <div class="overflow-y-auto">
                                <div class="flex items-center justify-center p-2 sm:p-4">
                                    <div class="w-full">
                                        <x-jet-validation-errors class="mb-4" />

                                        @if (session('status'))
                                            <div class="mb-4 text-sm font-medium text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="flex flex-col w-full">
                                        <form  wire:submit.prevent="update">
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Price (per day)</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Room Price" type="number" wire:model.lazy="price" name="price" id="price" value="{{old('price')}}"  autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Room Type
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model="roomType" name="roomType" id="roomType" >
                                                        <option value="">choose room type</option>
                                                        <option value="Single Self">Single Self</option>
                                                        <option value="Full Suit">Full Suit</option>
                                                        <option value="Normal Hall">Normal Conference Hall</option>
                                                        <option value="VIP Hall">VIP Conference Hall</option>

                                                    </select>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Phone Number" type="text" wire:model.lazy="phone" name="phone" id="phone" value="{{old('phone')}}" autofocus/>
                                                </label>
                                            </div>
                                            <div class="flex  flex-col md:flex-row mt-6  w-full mb-4">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Room Description</span>
                                                    <textarea
                                                        class="w-full py-1.5 px-3 form-control block rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                        rows="3" placeholder="Describe the room" wire:model.lazy="description" name="description" id="description"  autofocus
                                                    ></textarea>

                                                </label>
                                                <label class="block text-sm mx-2  flex-1">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Room Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model="roomStatus" name="roomStatus" id="roomStatus" >
                                                        <option value="free">Free</option>
                                                        <option value="private">Private</option>
                                                        <option value="maintanance">Under Maintanance</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <x-jet-button class="w-full mx-auto" >
                                                <p class="text-center mx-auto text-white">Update Room {{$room_no}}</p></x-jet-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

        </x-slot>
        <x-slot name="footer">
             <x-jet-button class="bg-red-800 mx-auto" wire:click="cancel">cancel</x-jet-button>
        </x-slot>
        </x-jet-dialog-modal>
{{--models is good--}}

    </div>
    </div>

