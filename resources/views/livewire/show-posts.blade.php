
<div class="py-12 min-height-screen overflow-y-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--        your styles starts here--}}
<div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
    <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>Registered Customer</h1>
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
    <x-jet-button wire:click="showCreateModel" class="text-center" >Add Customer</x-jet-button>
</div>
<div class="flex flex-col mt-2 p-4">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Identity</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address & Occupation</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room Asigned</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit/Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @if(count($paginator)>0)
                    @foreach($paginator as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{$user->name}}</div>
                                    <div class="text-sm text-gray-500">{{$user->phone}}</div>
                                    <div class="text-sm text-gray-500">{{$user->email}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @if(isset($user->customer->address))
                                    <span class="text-gray-500">Address: </span>{{$user->customer->address}}
                                @endif
                            </div>
                            <div class="text-sm text-gray-900">
                                @if(isset($user->customer->arrivingFrom))
                                    <span class="text-gray-500">Arriving From: </span>{{$user->customer->arrivingFrom}}
                                @endif
                            </div>
                            <div class="text-sm">
                                @if(isset($user->customer->occupation))
                                <span class="text-gray-500">Occupation: </span>{{$user->customer->occupation}}
                                @endif


                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm flex flex-col">
                                @if(is_null($customersId))
                                <span class="px-2 mb-1 inline-flex text-xs leading-5 font-semibold rounded-full text-green-800"> <span class="text-gray-500 dark:text-gray-400">Room number: </span>{{App\Models\room::find(App\Models\RoomAllocation::where('customer_id',$user->customer->id)->get()[0])[0]['room_no']}} </span>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-green-800"> <span class="text-gray-500 dark:text-gray-400">Remain Time</span><span class="text-green-500">{{Carbon\Carbon::parse(App\Models\RoomAllocation::where('customer_id',$user->customer->id)->get()[0]['toDate'])->diffForHumans()}}</span> </span>
                                 @endif
                            </div>
                       </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">


                            <button wire:click="showUpdate({{$user->id}})" class="text-indigo-600 hover:text-indigo-900 mx-2">Edit</button>
{{--                            <button wire:click="showBooking({{$user->id}})" class="text-orange-600 hover:text-orange-900 mx-2">Booking</button>--}}
                            @if(is_null($customersId))
                            <a href="{{route('pdf1',['userId'=>$user->id,'custId'=>$user->customer->id])}}">receipt</a>
                            @endif
                            <button wire:click="delete({{$user->id}})" class="text-red-600 hover:text-red-900 mx-2">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center px-4 py-20 text-blue-600">No Customer inserted (Click Button to add Customer)</td>
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
             <h2 class="my-2 text-center text-lg text-blue-500">Register Customer</h2>
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

                                 <form wire:submit.prevent="save" class="flex flex-col w-full">
                                     @csrf
                                     <div class="flex  flex-col md:flex-row mt-2 w-full">
                                                            <label class="block text-sm flex-1 mx-2">
                                                                <span class="text-gray-700 dark:text-gray-400">First Name</span>
                                                                <input class="capitalize block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Firstname" type="text" wire:model.lazy="fname" value="{{old('fname')}}" autofocus/>
                                                            </label>
                                                            <label class="block text-sm flex-1 mx-2">
                                                                <span class="text-gray-700 dark:text-gray-400">Middle Name</span>
                                                                <input class="capitalize block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Middlename" type="text" wire:model.lazy="mname" value="{{old('mname')}}" autofocus/>
                                                            </label>
                                                            <label class="block text-sm flex-1 mx-2">
                                                                <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                                                                <input class="capitalize block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Lastname" type="text" wire:model.lazy="lname" value="{{old('lname')}}" autofocus/>
                                                            </label>
                                                        </div>
                                     <div class="flex  flex-col md:flex-row mt-4 w-full">
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">email</span>
                                             <input class="block w-full rounded-md mt-1 text-sm  focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Email" type="email" wire:model.lazy="email" value="{{old('email')}}" autofocus="email" />
                                         </label>
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">phone Number</span>
                                             <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Phone Number" type="number" wire:model.lazy="phone" value="{{old('phone')}}" autofocus="phone"/>
                                         </label>
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">gender</span>
                                             <label class="flex items-center mt-4">
                                                 <input type="radio" class="form-radio h-3 w-3 text-blue-600" name="gender" wire:model.lazy="gender" value="{{old('gender','male')}}"><span class="mx-2 text-gray-700">male</span>
                                                 <input type="radio" class="form-radio h-3 w-3 text-blue-600" name="gender" wire:model.lazy="gender" value="{{old('gender','female')}}"><span class="ml-2 text-gray-700">female</span>
                                             </label>
                                         </label>
                                     </div>

                                     <div class="flex  flex-col md:flex-row mt-6  w-full">
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">Address</span>
                                             <input class="block w-full rounded-md mt-1 text-sm  focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter address" type="text" wire:model.lazy="address" value="{{old('address')}}" autofocus />
                                         </label>
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">Arriving From</span>
                                             <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter arriving From" type="text" wire:model.lazy="arrivingFrom" value="{{old('arrivingFrom')}}" autofocus/>
                                         </label>
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">Occupation</span>
                                             <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Occupation" type="text" wire:model.lazy="occupation" value="{{old('occupation')}}" autofocus/>
                                         </label>
                                     </div>
                                     <div class="flex  flex-col md:flex-row mt-4 mb-6  w-full">

                                         <label class="block text-sm flex-1 mx-2">
                                                        <span class="text-gray-700 dark:text-gray-400">
                                                            Available Rooms
                                                        </span>
                                             <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                     wire:model="roomAv" name="roomAv" id="roomAv" >
                                                 @if(count($rooms)>0)
                                                     <option value="">all rooms available</option>
                                                     @foreach($rooms as $rm)
                                                         <option value="{{$rm->room_no}}">{{$rm->room_no}}--{{$rm->roomType}}</option>
                                                     @endforeach
                                                 @else
                                                     <option value="">No room is available</option>
                                                 @endif

                                             </select>
                                         </label>
                                         <label class="block text-sm flex-1 mx-2">
                                             <span class="text-gray-700 dark:text-gray-400 capitalize">Days Number</span>
                                             <input class="w-full block rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="number of days" type="number" wire:model="days" value="{{old('days')}}" autofocus/>
                                         </label>



                                     </div>

                                     <x-jet-button class="w-full mx-auto my-10">
                                         <p class="text-center text-white mx-auto">submit</p></x-jet-button>
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


        {{--      updates user update--}}
        <x-jet-dialog-modal wire:model="updateModel">

            <x-slot name="title" >
                <h2 class="my-2 text-center text-lg text-blue-500">Update User Particulars</h2>
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

                                    <form wire:submit.prevent="update" class="flex flex-col w-full">
                                        @csrf
                                        <div class="flex  flex-col md:flex-row mt-2 w-full">
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">Firstname</span>
                                                <input class="capitalize block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Firstname" type="text" wire:model.lazy="fname" value="{{old('fname')}}" autofocus/>
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">Middlename</span>
                                                <input class="capitalize block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Middlename" type="text" wire:model.lazy="mname" value="{{old('mname')}}" autofocus/>
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">Lastname</span>
                                                <input class="capitalize block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Lastname" type="text" wire:model.lazy="lname" value="{{old('lname')}}" autofocus/>
                                            </label>
                                        </div>
                                        <div class="flex  flex-col md:flex-row mt-6  w-2/3 mx-auto">
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400 capitalize">phone Number</span>
                                                <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Phone Number" type="number"  wire:model.lazy="phone" value="{{old('phone')}}" autofocus/>
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400 capitalize">Email</span>
                                                <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple " placeholder="Enter Email" type="email"  wire:model.lazy="email" value="{{old('email')}}" autofocus="'email"/>
                                            </label>




                                        </div>

                                        <x-jet-button class="w-full mx-auto my-10">
                                            <p class="text-center text-white mx-auto">Update</p></x-jet-button>
                                    </form>
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
        {{--        create user update--}}


        {{--        accounting model--}}
        <x-jet-dialog-modal wire:model="accountingModel">

            <x-slot name="title" >
                <h2 class="my-2 text-center text-lg text-blue-500">Payments Details</h2>
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

                                    <form wire:submit.prevent="addAccount" class="flex flex-col w-full">
                                        @csrf
                                        <div class="flex  flex-col md:flex-row mt-6  w-full">
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400 capitalize">Total Cost</span>
                                                <input class="block w-full rounded-md mt-1 text-sm  focus:border-blue-400 focus:outline-none focus:shadow-outline-purple" placeholder="Total Cost" readonly type="text" wire:model="totalCost" value="{{old('totalCost')}}" autofocus />
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                   Payment Method
                                                </span>
                                                <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                        wire:model="paymentType" name="paymentType" id="paymentType" >
                                                    <option value="">Choose Payment Method</option>
                                                    <option value="cash">Cash At Hand</option>
                                                    <option value="mobile">Mobile Money</option>
                                                    <option value="bank">Bank Payments</option>
                                                </select>
                                            </label>
                                            <label class="block text-sm flex-1 mx-2">
                                           <span class="text-gray-700 dark:text-gray-400">
                                                   Payment Verifications
                                                </span>
                                                <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                        wire:model="paymentVer" name="paymentVer" id="paymentVer" >
                                                    <option value="">Confirm Payments</option>
                                                    <option value="verified">Verified</option>
                                                    <option value="not verified">Not Verified</option>
                                                </select>
                                            </label>
                                        </div>


                                        <x-jet-button class="w-full bg-blue-400 hover:bg-blue-500 mx-auto my-10">
                                            <p class="text-center mx-auto text-white">Finish Booking</p></x-jet-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </x-slot>
            <x-slot name="footer">
{{--                <x-jet-button class="bg-red-800 mx-auto" wire:click="cancel">cancel</x-jet-button>--}}
            </x-slot>
        </x-jet-dialog-modal>
        {{--Acounting Details --}}

        {{--        your styles ends here--}}
    </div>
</div>
