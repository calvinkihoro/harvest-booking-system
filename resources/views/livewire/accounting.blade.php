
<div class="py-12 min-height-screen overflow-y-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
        <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>Accounting Details</h1>
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

        <x-jet-button wire:click="showCreateModel" class="text-center" >Add Spending</x-jet-button>

    </div>

        <div class="flex flex-col mt-2 p-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Detail</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Method</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Authorized By</th>
{{--                                <th scope="col" class="relative px-6 py-3">--}}
{{--                                    <span class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit/Delete</span>--}}
{{--                                </th>--}}
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @if(count($paginator)>0)
                                @foreach($paginator as $user)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="ml-4  ">
                                                    <div class="text-sm font-medium text-gray-900" style="max-width: 350px;">{{$user->description}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                Payment Method:<span class="text-gray-400">{{$user->payment}}</span>
                                            </div>
                                            <div class="text-sm px-2  @if($user->type==='MONEY IN')text-green-500 @else text-red-500 @endif">
                                                {{$user->amount}}/= <span class="text-gray-300">{{$user->type}}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm flex flex-col">
                                                Name: {{$user->authorizeBy}}
                                            </div>
                                            <div class="text-sm font-medium text-gray-900">Created On: {{$user->created_at->diffForHumans()}}</div>

                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center px-4 py-20 text-blue-600">No Money informations</td>
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


        {{--        create user model--}}
        <x-jet-dialog-modal wire:model="createModel">

            <x-slot name="title" >
                <h2 class="my-2 text-center text-lg text-blue-500">Add Hotel Spendings</h2>
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

                                    <form wire:submit.prevent="addData" class="flex flex-col w-full">
                                        @csrf
                                        <div class="flex  flex-col md:flex-row mt-2 w-full">


                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                   Payment Method
                                                </span>
                                                <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                        wire:model.lazy="payment" name="payment" id="payment" >
                                                    <option value="">Choose Payment Method</option>
                                                    <option value="cash">Cash At Hand</option>
                                                    <option value="mobile">Mobile Money</option>
                                                    <option value="bank">Bank Payments</option>
                                                </select>
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                           <span class="text-gray-700 dark:text-gray-400">
                                                   Payment Type
                                                </span>
                                                <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                        wire:model.lazy="type" name="type" id="type" >
                                                    <option value="">Confirm Payments</option>
                                                    <option value="MONEY IN">MONEY IN</option>
                                                    <option value="MONEY OUT">MONEY OUT</option>
                                                </select>
                                            </label>


                                        </div>

                                        <div class="flex  flex-col md:flex-row mt-4 w-full">

                                            <label class="block text-sm mx-2 flex-1">
                                                <span class="text-gray-700 dark:text-gray-400">description</span>
                                                <textarea
                                                    class="w-full py-1.5 px-3 form-control block rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                    rows="3" placeholder="Describe the the expenses" wire:model.lazy="description" name="description" id="description"  autofocus="description"
                                                ></textarea>
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400 capitalize">Amount</span>
                                                <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter amount in/out in tz shilings" type="number" wire:model.lazy="amount" min='0' value="{{old('amount')}}" autofocus="amount"/>
                                            </label>
                                        </div>


                                        <x-jet-button class="w-full mx-auto my-10">
                                            <p class="text-center mx-auto text-white">Add Detail</p></x-jet-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </x-slot>
            <x-slot name="footer">  <x-jet-button class="bg-green-800 mx-auto" wire:click="clear">clear form</x-jet-button>
                <x-jet-button class="bg-red-800 mx-auto" wire:click="cancel">cancel</x-jet-button></x-slot>
        </x-jet-dialog-modal>
        {{--        create user model--}}

    </div>


</div>





