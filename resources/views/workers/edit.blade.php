<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Worker') }}
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
        <form action="{{ route('workers.update', $worker->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input name="name"
                          type="text"
                          class="block w-full"
                          value="{{ old('name', $worker->name) }}"
                          required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="surname" :value="__('Surname')"/>
                <x-text-input name="surname"
                          type="text"
                          class="block w-full"
                          value="{{ old('surname', $worker->surname) }}"
                          required/>
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="specialization" :value="__('Specialization')"/>
                <select id="select-specialization" name="specialization[]"  multiple class="block form-control" required>
                <option value="Plasterer" {{ in_array('Plasterer', explode(',', $worker->specialization)) ? 'selected' : '' }}>Plasterer</option>
                <option value="Bricklayer" {{ in_array('Bricklayer', explode(',', $worker->specialization)) ? 'selected' : '' }}>Bricklayer</option>
                <option value="Welder" {{ in_array('Welder', explode(',', $worker->specialization)) ? 'selected' : '' }}>Welder</option>
                <option value="Erector" {{ in_array('Erector', explode(',', $worker->specialization)) ? 'selected' : '' }}>Erector</option>
                <option value="Operator" {{ in_array('Operator', explode(',', $worker->specialization)) ? 'selected' : '' }}>Operator</option>
                <option value="Scaffolder" {{ in_array('Scaffolder', explode(',', $worker->specialization)) ? 'selected' : '' }}>Scaffolder</option>
                <option value="Carpenter" {{ in_array('Carpenter', explode(',', $worker->specialization)) ? 'selected' : '' }}>Carpenter</option>
                <option value="Roofer" {{ in_array('Roofer', explode(',', $worker->specialization)) ? 'selected' : '' }}>Roofer</option>
                <option value="Tiler" {{ in_array('Tiler', explode(',', $worker->specialization)) ? 'selected' : '' }}>Tiler</option>
                <option value="Plumber" {{ in_array('Plumber', explode(',', $worker->specialization)) ? 'selected' : '' }}>Plumber</option>
                <option value="Electrician" {{ in_array('Electrician', explode(',', $worker->specialization)) ? 'selected' : '' }}>Electrician</option>
                <option value="Painter" {{ in_array('Painter', explode(',', $worker->specialization)) ? 'selected' : '' }}>Painter</option>
                </select>
                <x-input-error :messages="$errors->get('specialization')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')"/>
                <x-text-input name="phone"
                          type="text"
                          class="block w-full"
                          value="{{ old('phone', $worker->phone) }}"
                          required/>
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="type_of_employment" :value="__('Type of Employment')"/>
                <select name="type_of_employment"  class="block w-full" required>
                    <option value="Full-time" {{ $worker->type_of_employment == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ $worker->type_of_employment == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Temporary" {{ $worker->type_of_employment == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                </select>
                <x-input-error :messages="$errors->get('type_of_employment')" class="mt-2" />
            </div>

            <div class="mt-4 flex">
                <x-secondary-button class="w-2/8 mr-2" onclick="window.history.back();">
                    {{ __('Back') }}
                </x-secondary-button>
                <x-primary-button class="w-full">
                    {{ __('Update') }}
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



