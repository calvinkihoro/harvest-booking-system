<div class="py-12 min-height-screen overflow-y-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
            <h1 class="capitalize my-2">
                <span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span>
                <span> / </span>Generate reports</h1>
        </div>

{{--        contents goes here--}}


        {{-- booking cart --}}
        <div class="w-full px-4 md:px-8 lg:px-12  flex justify-between items-center" id='booknow'>
            <div class="pt-10 pb-20 mb-12 bg-white rounded-lg shadow-xl subscribe-area wow fadeIn w-full "
                 data-wow-duration="1s" data-wow-delay="0.5s">
                <h1
                    class="my-6 text-center text-2xl text-theme-color font-bold sm:text-4xl subscribe-title uppercase">
                   Generate Reports.
                </h1>
                @if (session('message'))
                    <h1 class="my-6 text-green-300 text-center capitalize">
                        {{ session('message') }}</h1>
                @endif
                <x-jet-validation-errors class="mb-4" />
                <form wire:submit.prevent="submit">
                    @csrf
                    <div class="flex md:flex-row flex-col items-center justify-center">

                        <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                            <x-jet-label for="from" value="{{ __('From Date') }}" />
                            <x-jet-input wire:model.lazy="from" type="date" name="from" :value="old('from')"
                                         required />
                        </div>
                        <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5 flex flex-col justify-center">
                            <x-jet-label for="to" value="{{ __('To Date:') }}" />
                            <x-jet-input wire:model.lazy="to" type="date" name="to" :value="old('to')"
                                         required />
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col items-center justify-center">

                        <div class="px-4 md:px-0 mx-4 mt-2 w-full md:w-2/5  flex flex-col justify-center">

                                <span class="text-gray-700 dark:text-gray-400">
                                                  Booking Type
                                                </span>
                            <select required class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    name="type" wire:model.lazy="type" >
                                <option value="">Choose Report Type</option>
                                <option value="MONEY IN">Money In</option>
                                <option value="MONEY OUT">Money Out</option>
                            </select>
                            </label>
                        </div>
                        <div class="px-4 md:px-0 mx-4 pt-8 w-full md:w-2/5 flex flex-col  justify-between">
                            <button class="main-btn gradient-btn bg-theme-ben" class='mt-4' type="submit">Generate Report</button>

                        </div>
                    </div>


                </form>


            </div>
        {{-- booking cart --}}
        <!-- row -->
        </div> <!-- subscribe area -->


    </div>
</div>

