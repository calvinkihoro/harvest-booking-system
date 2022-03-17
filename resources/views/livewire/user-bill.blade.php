<div class="py-12 min-height-screen overflow-y-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
            <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>manage orders</h1>
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
                    <option value="100">500</option>
                    <option value="1000">1000</option>
                    <option value="10000">10000</option>
                </select>
            </label>
            <x-jet-button class="my-2" wire:click="showCreateModel1">{{('Add new Order')}}</x-jet-button>

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
                        <th class="px-4 py-3">Order Nickname</th>
                        <th class="px-4 py-3">Total Price</th>
                        <th class="px-4 py-3">Delivered</th>
                        <th class="px-4 py-3">Admin Operations</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if(count($paginator)===0)
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="6" class="text-center px-4 py-20 text-blue-600">No Order inserted (Click Button to add new order)</td>
                        </tr>

                    @else
                        @foreach ($paginator as $room)

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">

                                    <div class="flex flex-col">
                                          <p class="text-xs text-gray-600 dark:text-gray-400">
                                                <span class="text-blue-500 font-normal">Order Name: </span>{{$room->nickname}}
                                            </p>
                                        <button wire:click="showBill({{$room->id}})">
                                        <p class="italic text-gray-400 text-left">click to add items in this bill</p>
                                        </button>
                                    </div>

                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="" style="max-width:150px; overflow:hidden;">
                                        @php
                                            $a=\App\Models\Order::where('bill_id', $room->id)->get();
                                            $total1=0;
                                        @endphp
                                        @foreach ($a as  $as1)
                                            @php
                                            $a1=(int)\App\Models\Item::find($as1->item_id)->amount * $as1->quantity;
                                               $total1= $total1+ $a1
                                            @endphp

                                            @endforeach
                                        {{number_format($total1)}}/=
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                   {{$room->status}}
                                </span>
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
                <h2 class="text-center text-green-500">Add New order</h2>
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
                                        <form  wire:submit.prevent="submit">
                                            <div class="flex flex-col md:flex-row mt-2 mb-10 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Order Name</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Order Nickname" type="text" wire:model.lazy="orderName" name="orderName" id="orderName" value="{{old('orderName')}}" autofocus/>
                                                </label>

                                            </div>
                                            <x-jet-button class="w-full mx-auto">
                                                <p class="text-center mx-auto">Create New Order</p></x-jet-button>
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
                <h2 class="text-center text-green-500">Update order</h2>
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
                                            <div class="flex flex-col md:flex-row mt-2 mb-10 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Order Name</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter Order Nickname" type="text" wire:model.lazy="orderName" name="orderName" id="orderName" value="{{old('orderName')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                   Delivered Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="orderStatus" name="orderStatus" id="orderStatus" >
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="Not Delivered">Not Delivered</option>

                                                    </select>
                                                </label>

                                            </div>
                                            <x-jet-button class="w-full mx-auto">
                                                <p class="text-center mx-auto">Update Order</p></x-jet-button>
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

        {{--xxxx my model--}}
        <x-jet-dialog-modal wire:model="billModel1">

            <x-slot name="title" >
                <h2 class="text-center text-green-500">Add and Update Bill</h2>
            </x-slot>
            <x-slot name="content">
                                <div class="w-full px-2  py-4 flex flex-col md:flex-row justify-between items-center">
                                                        <div class="w-1/2 mx-2 bg-white shadow-md rounded-md border">
                                                            <div class="flex flex-col justify-between items-center px-5 py-3 text-gray-700 border-b">

                                                                <h2 class="min-w-full text-lg text-gray-700 font-semibold capitalize text-center pb-4">Add Items to Order</h2>

                                                                <form class="" wire:submit.prevent="submitOrder">
                                                                    <x-jet-validation-errors class="mb-4" />
                                                                    @if (session('status'))
                                                                        <div class="mb-4 text-sm font-medium text-green-600">
                                                                            {{ session('status') }}
                                                                        </div>
                                                                    @endif
                                                                    @if(session()->has('message'))
                                                                        <h1 class="text-green-500 mb-4">  {{session('message')}}</h1>
                                                                    @endif
                                                                    @csrf
                                                                    <div class="flex flex-col md:flex-row mt-2 w-full">
                                                                        <label class="block text-sm flex-1 mx-2">
                                                        <span class="text-gray-700 dark:text-gray-400">
                                                           Choose items to Order
                                                        </span>
                                                                            <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                                                    wire:model="itemValue" name="itemValue" id="itemValue">
                                                                                @if(count($item)>0)
                                                                                    <option value="">choose item to order</option>
                                                                                    @foreach($item as $it)
                                                                                        <option value="{{$it->id}}">{{$it->itemName}}({{$it->amount}})   {{$it->type}}</option>
                                                                                    @endforeach
                                                                                @else
                                                                                    <option value="">No Items in Order Table</option>

                                                                                @endif
                                                                            </select>
                                                                        </label>


                                                                    </div>
                                                                    <div class="flex flex-col md:flex-row mt-2 mb-10 w-full">
                                                                        <label class="block text-sm flex-1 mx-2">
                                                                            <span class="text-gray-700 dark:text-gray-400">Number Of Items</span>
                                                                            <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                                                   min="1" required placeholder="Enter item Quantity" type="number" wire:model.lazy="quantity" name="quantity" value="{{old('quantity')}}" autofocus="'quantity"/>
                                                                        </label>


                                                                    </div>

                                                                    <div class="flex justify-end mt-4">
                                                                        <x-jet-button>Add To Cart</x-jet-button>
                                                                    </div>
                                                                </form>
                                                        </div>
                                                        </div>

                                                        <div class="w-1/2 mx-2 bg-white shadow-md rounded-md border ">

                                                            <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
                                                                <h3 class="text-sm">All Order</h3>
                                                                <button>
                                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b flex flex-col max-h-60 overflow-y-auto">


                                                                @if(count($order)>0)

                                                                    @php
                                                                        $total=0;
                                                                    @endphp
                                                                    @foreach($order as $oda)
                                                                        <div class="w-full flex items-center justify-between">
                                                                            <img class="object-cover w-[25px] h-[25px] rounded-full border-2 border-gray-400 shadow-lg" src="{{url('storage/stockImage/'.\App\Models\Item::find($oda->item_id)->photo)}}" alt="image"  />

                                                                            <label class="text-sm mb-2 px-4">

                                                                                <span class="flex flex-col">

                                                                                    <span class="text-green-500 capitalize">{{\App\Models\Item::find($oda->item_id)->itemName}}</span>

                                                    <span class="text-gray-500 text-left">{{\App\Models\Item::find($oda->item_id)->amount}} * {{$oda->quantity}} ={{$oda->quantity*\App\Models\Item::find($oda->item_id)->amount}}/=</span>
                                                 @php
                                                     $total=$total +($oda->quantity*\App\Models\Item::find($oda->item_id)->amount);
                                                 @endphp
                                                </span></label>
                                                                            <button class="text-right text-red-500 hover:text-red-300" wire:click="deleteBill({{$oda}})">remove</button>
                                                                        </div>
                                                                        <hr class="border-1 border-gray-400">

                                                                    @endforeach
                                                                    <h1 class="text-right mt-2" > Total: {{number_format($total)}}/=</h1>

                                                                    <div class="flex justify-between items-center px-5 py-3">
                                                                        @if($billId)
                                                                            <a href='{{route('billReceipt',['orderId'=>$billId])}}' class="px-3 py-1 text-white text-sm rounded-md bg-green-300 hover:bg-green-400 focus:outline-none">Receipt</a>
                                                                        @endif
                                                                        <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none" wire:click="addPay({{$total}})">Pay</button>

                                                                    </div>
                                                            </div>

                                                        @else
                                                                    <label class="text-sm mb-2 px-4">No Item In order List</label>


                                                            </div>

                                                            <div class="flex justify-between items-center px-5 py-3">
                                                                @if($billId)
                                                                <a href='{{route('billReceipt',['orderId'=>$billId])}}' class="px-3 py-1 text-white text-sm rounded-md bg-green-300 hover:bg-green-400 focus:outline-none">Receipt</a>
                                                               @endif
                                                                <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none" wire:click="addPay(0)">Pay</button>

                                                    </div>
                                                            @endif
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

