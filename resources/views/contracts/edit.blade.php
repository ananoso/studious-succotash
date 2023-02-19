<x-app-layout>
    <x-slot name="header">
        {{ __('Edit contract') }}
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
        <form action="{{ route('contracts.update', $contract) }}" method="POST">
            @csrf
            @method('POST')

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-text-input name="description"
                         id="mytextarea"
                         type="textarea"
                         class="block w-full"
                         value="{{ $contract->description }}"
                         />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="place" :value="__('Place')"/>
                <x-text-input name="place"
                         type="text"
                         class="block w-full"
                         value="{{ $contract->place }}"
                         required/>
                <x-input-error :messages="$errors->get('place')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="start_at" :value="__('Start at')"/>
                <x-text-input name="start_at"
                         type="date"
                         class="block w-full"
                         value="{{ $contract->start_at }}"
                         required/>
                <x-input-error :messages="$errors->get('start_at')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="end_at" :value="__('End at')"/>
                <x-text-input name="end_at"
                         type="date"
                         class="block w-full"
                         value="{{ $contract->end_at }}"
                         required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="amount" :value="__('Amount')"/>
                <x-text-input type="number"
                         name="amount"
                         class="block w-full"
                         value="{{ $contract->amount }}"
                         required/>

                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
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
    @push('script')
        <script type="text/javascript">
            tinymce.init({
            selector: '#mytextarea'
            });
        </script>
    @endpush
</x-app-layout>

