<div class="py-12 min-height-screen overflow-y-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
            <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>Manage Stock</h1>
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
            <x-jet-button class="my-2" wire:click="showCreateModel1">{{('Add New Stock')}}</x-jet-button>

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
                        <th class="px-4 py-3">Item Details</th>
                        <th class="px-4 py-3">Remain In Stock</th>
                        <th class="px-4 py-3">Price<span class="text-[10px] text-blue-500"> /one</span></th>
                        <th class="px-4 py-3">Visibility Status</th>
                        <th class="px-4 py-3">Last Booking</th>
                        <th class="px-4 py-3">Admin Operations</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if(count($rooms)===0)
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="6" class="text-center px-4 py-20 text-blue-600">No Item inserted (Click Button to add new items)</td>
                        </tr>

                    @else
                        @foreach ($paginator as $room)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">

                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full border-2 border-gray-400 shadow-lg" src="{{url('storage/stockImage/'.$room->photo)}}" alt="image"  />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold"><span class="text-blue-500 font-normal">Item Name: </span> {{$room->itemName}}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                <span class="text-blue-500 font-normal">Item Type: </span>{{$room->type}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="" style="max-width:150px; overflow:hidden;">
                                        {{$room->original_stock - $room->current_stock}}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$room->amount}}/=
                                </td>
                                <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                   {{$room->visible}}
                                </span>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{$room->updated_at->diffForHumans()}}
                                </td>
                                <td>
                                    <button wire:click="showUpdate1({{$room->id}})" class="text-blue-600 hover:text-blue-500 mx-2">Add to stock</button>
                                    <button wire:click="showUpdate({{$room->id}})" class="text-indigo-600 hover:text-indigo-500 mx-2">Edit</button>
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
                <h2 class="mt-2 p-4 rounded-lg text-center text-blue-400">Add New Item In Stock</h2>
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
                                        <form  wire:submit.prevent="submit"  enctype="multipart/form-data">
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Item Name</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Item Name" type="text" wire:model.lazy="itemName" name="itemName" id="itemName" value="{{old('itemName')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Item Type
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="itemType" name="itemType" id="itemType" value="{{old('itemType')}}">
                                                        <option value="">choose Item type</option>
                                                        <option value="food">Food</option>
                                                        <option value="drink">Drinks</option>
                                                    </select>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Price (per item)</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Item Price per one" type="number" wire:model.lazy="price" name="price" id="price" value="{{old('price')}}"  autofocus/>
                                                </label>
                                            </div>
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm  mx-2  flex-1">
                                                    <span class="text-gray-700 dark:text-gray-400">Item Picture</span>
                                                    <input class="block w-full rounded-sm mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                           type="file" wire:model="images" name="images" id="images" autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Quantity</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Number Of products" type="number" wire:model.lazy="quantity" name="quantity" id="quantity" value="{{old('quantity')}}"  autofocus/>
                                                </label>
                                                <label class="block text-sm mx-2  flex-1">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Visibility Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="visStatus" name="visStatus" id="visStatus" >
                                                        <option value="visible">Visible</option>
                                                        <option value="Not Visible">Not Visible</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <div class="flex flex-row md:flex-row my-6  w-full">
                                                <div wire:loading wire:target="images" class="text-gray-700 text-center">Loading images...</div>
                                                @if ($images)
                                                    <h1>Photo Preview:</h1>

                                                    <div class="flex flex-col md:flex-row mt-2 w-full bg-white shadow-md p-4">

                                                            <div class="block text-sm mx-2">

                                                                <img class="object-contain rounded-sm h-20 w-20 border-2 border-blue-900 shadow-lg " src="{{ $images->temporaryUrl() }}">
                                                            </div>

                                                    </div>

                                                @endif
                                            </div>
                                            <x-jet-button class="w-full mx-auto">
                                                <p class="text-center mx-auto">Add In Stock</p></x-jet-button>
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

        {{--update my model--}}
        <x-jet-dialog-modal wire:model="updateModel1">

            <x-slot name="title" >
                <h2 class="mt-2 p-4 rounded-lg text-center text-blue-400">Update Item In Stock</h2>
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
                                        <form  wire:submit.prevent="update"  enctype="multipart/form-data">
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Item Name</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Item Name" type="text" wire:model.lazy="itemName" name="itemName" id="itemName" value="{{old('itemName')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Item Type
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="itemType" name="itemType" id="itemType" value="{{old('itemType')}}">
                                                        <option value="">choose Item type</option>
                                                        <option value="food">Food</option>
                                                        <option value="drink">Drinks</option>
                                                    </select>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Price (per item)</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Item Price per one" type="number" wire:model.lazy="price" name="price" id="price" value="{{old('price')}}"  autofocus/>
                                                </label>
                                            </div>
                                            <div class="flex flex-col md:flex-row mt-2  mb-4 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Quantity</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Number Of products" type="number" wire:model.lazy="quantity" name="quantity" id="quantity" value="{{old('quantity')}}"  autofocus/>
                                                </label>
                                                <label class="block text-sm mx-2  flex-1">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Visibility Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="visStatus" name="visStatus" id="visStatus" >
                                                        <option value="visible">Visible</option>
                                                        <option value="Not Visible">Not Visible</option>
                                                    </select>
                                                </label>
                                            </div>
                                            <x-jet-button class="w-full mx-auto">
                                                <p class="text-center mx-auto">Update Stock</p></x-jet-button>
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

        {{--item my model--}}
        <x-jet-dialog-modal wire:model="updateModel2">

            <x-slot name="title" >
                <h2 class="mt-2 p-4 rounded-lg text-center text-blue-400">Update the Stock</h2>
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
                                        <form  wire:submit.prevent="update1" >
                                            <div class="flex flex-col md:flex-row mt-2 mb-4 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">New Item Quantity</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter New Stoke Quantity" type="text" wire:model.lazy="quantity" name="quantity" id="quantity" value="{{old('quantity')}}" autofocus/>
                                                </label>
                                            </div>
                                            <x-jet-button class="w-full mx-auto">
                                                <p class="text-center mx-auto">Update Stock</p></x-jet-button>
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


    </div>
</div>

