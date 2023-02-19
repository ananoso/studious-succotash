<x-app-layout>
    <x-slot name="header">
        {{ __('Contract management') }}
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
                    <span class="font-semibold text-green-500">{{ __('Success') }}</span>
                    <p class="text-sm text-gray-600">{{ $message }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="p-4 bg-white rounded-lg shadow-md">
        <form action="{{ route('user_contracts.store') }}" method="POST">
            @csrf
            @method('POST')

            <div class="mt-4">
                <h2><b>{{ __('Contract selected:') }}</b> {{ $contract->place }}</h2>
                <h2><b>{{ __('User selected:') }}</b> {{ $user->name }}</h2>
            </div>

            <div class="mt-4">
                <x-text-input type="hidden"
                         name="user_id"
                         class="block w-full"
                         value="{{ $user->id }}" />
            </div>

            <div class="mt-4">
                <x-text-input type="hidden"
                         name="contract_id"
                         class="block w-full"
                         value="{{ $contract->id }}" />
            </div>

            <div class="mt-4">
                <x-input-label for="amount" :value="__('Hourly rate')"/>
                <x-text-input type="number"
                         name="hourly_rate"
                         class="block w-full" />
                <x-input-error :messages="$errors->get('hourly_rate')" class="mt-2" />
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

