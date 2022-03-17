<div class="py-12 min-height-screen overflow-y-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="px-2 py-4 flex flex-col md:flex-row justify-between items-center mx-4">
            <h1 class="capitalize my-2"><span><a href="{{route('dashAD_')}}" class="text-blue-500 hover:text-blue-700">Home</a></span><span> / </span>manage blogs</h1>
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
            <x-jet-button class="my-2" wire:click="showCreateModel1">{{('Add new Post')}}</x-jet-button>

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
                        <th class="px-4 py-3">Post Tittle</th>
                        <th class="px-4 py-3">Post Description</th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Published On</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if(count($rooms)===0)
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <td colspan="6" class="text-center px-4 py-20 text-blue-600">No Posts inserted (Click Button to add new post)</td>
                        </tr>

                    @else
                        @foreach ($paginator as $room)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="text-lg text-gray-600 dark:text-gray-400">
                                               {{$room->heading}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="max-h-[50px] bg-gray-300 p-2 rounded-md" style="max-width:350px; overflow:auto;">
                                        {{$room->description}}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <img class="object-cover w-[50px] h-[50px] rounded-md border-2 border-gray-400 shadow-lg" src="{{url('storage/posts/'.$room->image)}}" alt="image"  />

                                </td>
                                <td class="px-4 py-3">
                             <p class="text-center">  {{$room->status}}</p>
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
                <h2 class="mt-2 p-4  text-center text-blue-400">Add Blog Post</h2>
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
                                                    <span class="text-gray-700 dark:text-gray-400">Post Heading</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter post Heading" type="text" wire:model.lazy="heading" name="heading" id="heading" value="{{old('heading')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm mx-2 flex-1">
                                                    <span class="text-gray-700 dark:text-gray-400">Post Description</span>
                                                    <textarea
                                                        class="w-full py-1.5 px-3 form-control block rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                        rows="3" placeholder="Describe the post" wire:model.lazy="description" name="description" id="description"  autofocus
                                                    ></textarea>
                                                </label>
                                            </div>
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Post Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="postType" name="roomType" id="roomType" >
                                                        <option value="">choose post status</option>
                                                        <option value="public">public</option>
                                                        <option value="pending">pending</option>
                                                    </select>
                                                </label>

                                                <label class="block text-sm  mx-2  flex-1">
                                                    <span class="text-gray-700 dark:text-gray-400">post picture</span>
                                                    <input class="block w-full rounded-sm mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                           type="file" wire:model="images" name="images" id="images" autofocus/>
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


        {{--model update my model--}}
        <x-jet-dialog-modal wire:model="updateModel1">

            <x-slot name="title" >
                <h2 class="mt-2 p-4  text-center text-blue-400">Add Blog Post</h2>
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
                                    @error('images') <span class="text-red-700 text-center">{{ $message }}</span> @enderror
                                    <div class="flex flex-col w-full">
                                        <form  wire:submit.prevent="update" >
                                            <div class="flex flex-col md:flex-row mt-2 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                    <span class="text-gray-700 dark:text-gray-400">Post Heading</span>
                                                    <input class="block w-full rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple "
                                                           placeholder="Enter post Heading" type="text" wire:model.lazy="heading" name="heading" id="heading" value="{{old('heading')}}" autofocus/>
                                                </label>
                                                <label class="block text-sm mx-2 flex-1">
                                                    <span class="text-gray-700 dark:text-gray-400">Post Description</span>
                                                    <textarea
                                                        class="w-full py-1.5 px-3 form-control block rounded-md mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-purple"
                                                        rows="3" placeholder="Describe the post" wire:model.lazy="description" name="description" id="description"  autofocus
                                                    ></textarea>
                                                </label>
                                            </div>
                                            <div class="flex flex-col md:flex-row mt-2 mb-6 w-full">
                                                <label class="block text-sm flex-1 mx-2">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Post Status
                                                </span>
                                                    <select class="block w-full rounded-md mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                            wire:model.lazy="postType" name="roomType" id="roomType" >
                                                        <option value="">choose post status</option>
                                                        <option value="public">public</option>
                                                        <option value="pending">pending</option>
                                                    </select>
                                                </label>
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

    </div>
</div>

