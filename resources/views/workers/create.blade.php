<x-app-layout>
    <x-slot name="header">
        {{ __('Create Worker') }}
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
        <b>{{__('Worker Information')}}</b>
        <form action="{{ route('workers.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input name="name"
                         type="text"
                         class="block w-full"
                         value="{{ old('name') }}"
                         required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="surname" :value="__('Surname')"/>
                <x-text-input name="surname"
                         type="text"
                         class="block w-full"
                         value="{{ old('surname') }}"
                         required/>
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="specialization" :value="__('Specialization')"/>
                <select id="select-specialization" name="specialization[]"  multiple class="block form-control" required>
                    <option value="Plasterer">Plasterer</option>
                    <option value="Bricklayer">Bricklayer</option>
                    <option value="Welder">Welder</option>
                    <option value="Erector">Erector</option>
                    <option value="Operator">Operator</option>
                    <option value="Scaffolder">Scaffolder</option>
                    <option value="Carpenter">Carpenter</option>
                    <option value="Roofer">Roofer</option>
                    <option value="Tiler">Tiler</option>
                    <option value="Plumber">Plumber</option>
                    <option value="Electrician">Electrician</option>
                    <option value="Painter">Painter</option>
                </select>
                <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')"/>
                <x-text-input name="phone"
                         type="text"
                         class="block w-full"
                         value="{{ old('phone') }}"
                         required/>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="type_of_employment" :value="__('Type of Employment')"/>
                <select name="type_of_employment"  class="block w-full" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Temporary">Temporary</option>
                </select>
                <x-input-error :messages="$errors->get('type_of_employment')" class="mt-2" />
            </div>

            <div class="mt-4 flex">
                <x-secondary-button class="w-2/8 mr-2" onclick="window.history.back();">
                    {{ __('Back') }}
                </x-secondary-button>
                <x-primary-button class="w-full">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

    </div>
    <x-slot name="scripts">
        <script>
            new TomSelect("#select-specialization",{});
        </script>
    </x-slot>
</x-app-layout>
