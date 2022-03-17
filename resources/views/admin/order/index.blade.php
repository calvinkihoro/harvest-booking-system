<x-app-layout>
    <div class="py-12 min-height-screen overflow-y-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
                <h1 class="capitalize my-2">
                    <span><a href="{{route('bill')}}" class="text-blue-500 hover:text-blue-700">Manage bills</a></span>
                    <span> / </span>Orders</h1>
            </div>

            <div class="w-full px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-auto">
                    <div class="mt-4 w-1/2">
                        <div class="p-6 bg-white rounded-md shadow-md ">
                            <h2 class="text-lg text-gray-700 font-semibold capitalize text-center pb-4">Add Items to Order</h2>

                            <form class="" method="post" action="{{route('orders1',['id'=>$id])}}">
                                <x-jet-validation-errors class="mb-4" />
                                @if(session()->has('message'))
                                  <h1 class="text-green-500 mb-4">  {{session('message')}}</h1>
                                @endif
                                @csrf
                                <div class="flex flex-col md:flex-row mt-2 mb-10 w-full">
                                    <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                   Choose items to Order
                                                </span>
                                        <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                              name="item" id="item">
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
                                              min="0" required placeholder="Enter item Quantity" type="number" name="quantity" value="{{old('quantity')}}" autofocus="'quantity"/>
                                    </label>


                                </div>

                                <div class="flex justify-end mt-4">
                                   <x-jet-button>Add To Item To Order List</x-jet-button>
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="mt-4">

                    <div class="mt-4">
                        <div class="h-100 w-full bg-white shadow-md rounded-md border">

                                <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
                                    <h3 class="text-sm">All Order</h3>
                                    <button>
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b flex flex-col">
                                    @if(count($order)>0)

                                                @php
                                                $total=0;
                                                @endphp
                                    @foreach($order as $oda)
                                            @if(isset($oda->item->itemName) && isset($oda->item->amount))
                                            <label class="text-sm mb-2 px-4"><span class="flex flex-col"><span class="text-green-500 capitalize">{{$oda->item->itemName}}</span>

                                                    <span class="text-gray-500 text-left">{{$oda->item->amount}} * {{$oda->quantity}} ={{$oda->quantity*$oda->item->amount}}/=</span>
                                                 @php
                                                     $total=$total +($oda->quantity*$oda->item->amount);
                                                 @endphp
                                                </span></label><hr class="border-1 border-gray-400">

                                            @endif
                                        @endforeach
                                       <h1 class="text-right mt-2"> Total: {{$total}}/=</h1>
                                    @else
                                        <label class="text-sm mb-2 px-4">No Item In order List</label>
                                    @endif

                                </div>

                                <div class="flex justify-between items-center px-5 py-3">
                                    <button class="px-3 py-1 text-gray-700 text-sm rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Cancel</button>
                                    <button class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">Save</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
