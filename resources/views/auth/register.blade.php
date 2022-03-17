<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('registerP') }}" >
            @csrf
            <input type="hidden" name="role" value="user" required>
            <div>
                <x-jet-label for="firstname" value="{{ __('Firstname') }}" />
                <x-jet-input id="fname" class="block mt-1 w-full capitalize" type="text" name="fname" :value="old('fname')"  autofocus required autocomplete="firstname" />
            </div>
            <div class="mt-4">
                <x-jet-label for="middlename" value="{{ __('Middlename') }}" />
                <x-jet-input id="mname" class="block mt-1 w-full capitalize" type="text" name="mname" :value="old('mname')"  autofocus required autocomplete="middlename" />
            </div>
            <div class="mt-4">
                <x-jet-label for="lastname" value="{{ __('lastname') }}" />
                <x-jet-input id="lname" class="block mt-1 w-full capitalize" type="text" name="lname" :value="old('lname')"  autofocus required autocomplete="lastname" />
            </div>
            <div class="mt-4">
                <x-jet-label for="lastname" value="{{ __('Gender') }}" />
                <label class="inline-flex items-center mt-2">
                    <input type="radio" class="form-radio h-3 w-3 text-blue-600" name="gender" value="{{old('gender','male')}}"><span class="mx-2 text-gray-700">male</span>
                    <input type="radio" class="form-radio h-3 w-3 text-blue-600" name="gender" value="{{old('gender','female')}}"><span class="ml-2 text-gray-700">female</span>
                </label>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  required/>
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"  autocomplete="new-password" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
