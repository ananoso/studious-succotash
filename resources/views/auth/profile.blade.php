<x-app-layout>
    <x-slot name="header">
        {{ __('My profile') }}
    </x-slot>

    @if ($message = Session::get('success'))
        <div class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                    </path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500">Success</span>
                    <p class="text-sm text-gray-600">{{ $message }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="p-4 bg-white rounded-lg shadow-md">
        <b>{{__('Account information')}}</b>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input type="text"
                         id="name"
                         name="name"
                         class="block w-full"
                         value="{{ old('name', auth()->user()->name) }}"
                         required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input name="email"
                         type="email"
                         class="block w-full"
                         value="{{ old('email', auth()->user()->email) }}"
                         required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('New password')"/>
                <x-text-input type="password"
                         name="password"
                         class="block w-full" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label id="password_confirmation" :value="__('New password confirmation')"/>
                <x-text-input type="password"
                         name="password_confirmation"
                         class="block w-full" />
            </div>
        </br>
            <b>{{__('Profile information')}}</b>

            <div class="mt-4">
                <x-input-label for="first_name" :value="__('First name')"/>
                <x-text-input type="text"
                         name="first_name"
                         class="block w-full"
                         value="{{ old('first_name', auth()->user()->first_name) }}" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="surname" :value="__('Last name')"/>
                <x-text-input type="text"
                         name="surname"
                         class="block w-full"
                         value="{{ old('surname', auth()->user()->surname) }}" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="company_name" :value="__('Company name')"/>
                <x-text-input type="text"
                         name="company_name"
                         class="block w-full"
                         value="{{ old('company_name', auth()->user()->company_name) }}" />
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="pesel" :value="__('PESEL')"/>
                <x-text-input type="number"
                         name="pesel"
                         class="block w-full"
                         value="{{ old('pesel', auth()->user()->pesel) }}"
                         min="10000000000"
                         max=99999999999
                         onKeyPress="if(this.value.length==11) return false;" />
                <x-input-error :messages="$errors->get('pesel')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="nip" :value="__('NIP')"/>
                <x-text-input type="number"
                         name="nip"
                         class="block w-full"
                         value="{{ old('nip', auth()->user()->nip) }}"
                         min="100000000"
                         max=999999999
                         onKeyPress="if(this.value.length==9) return false;" />
                <x-input-error :messages="$errors->get('nip')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button class="block w-full">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
