<x-app-layout>
    <x-slot name="header">
        {{ __('Create time entry') }}
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
        <b>{{__('Contract information')}}</b>
        <form action="{{ route('time_entry.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mt-4">
                <x-input-label for="worker_id" :value="__('Worker')"/>
                    <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="user_contract_id" required>
                        @foreach ($workers as $worker)
                            <option value="{{ $worker->id }}">{{ $worker->name }} {{ $worker->surname }}</option>
                        @endforeach
                    </select>
                <x-input-error :messages="$errors->get('worker_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="user_contract_id" :value="__('Contract')"/>
                <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="user_contract_id">
                    @foreach ($contracts as $contract)
                        <option value="{{ $contract->contract_id }}">{{ $contract->contract->place }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_contract_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="hours_amount" :value="__('Worked hours')"/>
                <x-text-input type="number"
                         name="hours_amount"
                         class="block w-full"
                         required/>
                <x-input-error :messages="$errors->get('hours_amount')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-text-input name="description"
                         type="text"
                         class="block w-full"
                         value="{{ old('description') }}"
                         />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="date" :value="__('Date')"/>
                <x-text-input name="date"
                         type="date"
                         class="block w-full"
                         value="{{ old('date') }}"
                         required/>
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
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
            const today = new Date();
            const date = today.toISOString().substr(0, 10);
            document.querySelector('input[name="date"]').value = date;
        </script>
    </x-slot>
</x-app-layout>

