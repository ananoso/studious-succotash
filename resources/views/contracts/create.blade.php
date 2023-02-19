<x-app-layout>
    <x-slot name="header">
        {{ __('Create contract') }}
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
        <form action="{{ route('contracts.store') }}" method="POST">
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
                <x-input-label for="guid" :value="__('ID')"/>
                <x-text-input name="guid"
                         type="text"
                         class="block w-full"
                         value="{{ old('guid') }}"
                         required/>
                <x-input-error :messages="$errors->get('guid')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="contract_type" :value="__('Type of contract')"/>
                <select name="contract_type"  class="block w-full">
                    <option value="General execution agreement">General execution agreement</option>
                    <option value="Partial execution agreement">Partial execution agreement</option>
                    <option value="Subcontracting agreement">Subcontracting agreement</option>
                </select>
                <x-input-error :messages="$errors->get('contract_type')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-text-input name="description"
                         id="mytextarea"
                         type="textarea"
                         class="block w-full"
                         value="{{ old('description') }}"
                         />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="type_of_investment" :value="__('Type of investment')"/>
                <select id="select-investment" name="type_of_investment[]" multiple class="block form-control">
                    <option value="Road investment">Road investment</option>
                    <option value="Bridge investment">Bridge investment</option>
                    <option value="Electrical infrastructure">Electrical infrastructure</option>
                    <option value="Water infrastructure">Water infrastructure</option>
                    <option value="Sewage infrastructure">Sewage infrastructure</option>
                    <option value="Residential buildings">Residential buildings</option>
                    <option value="Office buildings">Office buildings</option>
                    <option value="Aviation infrastructure">Aviation infrastructure</option>
                    <option value="Railway infrastructure">Railway infrastructure</option>
                    <option value="Social infrastructure">Social infrastructure</option>
                    <option value="Other">Other</option>
                </select>
                <x-input-error :messages="$errors->get('type_of_investment')" class="mt-2" />
            </div>

            <div class="mt-4" id="other-investment" style="display: none;">
                <x-input-label for="other_investment" :value="__('Other investment')"/>
                <input type="text" name="other_investment" class="block w-full" />
            </div>

            <div class="mt-4">
                <x-input-label for="country" :value="__('Country')"/>
                <x-text-input name="country"
                         type="text"
                         class="block w-full"
                         value="{{ old('country') }}"
                         required/>
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="city" :value="__('City')"/>
                <x-text-input name="city"
                         type="text"
                         class="block w-full"
                         value="{{ old('city') }}"
                         required/>
                <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>

            <div class="mt-4 inline-block pr-4">
                <x-input-label for="start_at" :value="__('Start date')"/>
                <x-text-input name="start_at"
                         type="date"
                         class="block w-36"
                         value="{{ old('start_at') }}"
                         required/>
                <x-input-error :messages="$errors->get('start_at')" class="mt-2" />
            </div>

            <div class="mt-4 inline-block">
                <x-input-label for="end_at" :value="__('End date')"/>
                <x-text-input name="end_at"
                         type="date"
                         class="block w-36"
                         value="{{ old('end_at') }}"
                         required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <br>

            <div class="mt-4 inline-block pr-4">
                <x-input-label for="amount" :value="__('Contract amount')"/>
                <x-text-input type="number"
                         name="amount"
                         class="block w-full"
                         required/>
                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <div class="mt-4 inline-block">
                <x-input-label for="currency" :value="__('Currency')"/>
                <select name="currency"  class="block">
                    <option value="PLN">PLN</option>
                    <option value="USD">USD</option>
                    <option value="CHF">CHF</option>
                    <option value="GBP">GBP</option>
                    <option value="EUR">EUR</option>
                </select>
                <x-input-error :messages="$errors->get('currency')" class="mt-2" />
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
            document.querySelector('[name="type_of_investment[]"]').addEventListener('change', function (event) {
                document.querySelector('#other-investment').style.display = event.target.value === 'Other' ? 'block' : 'none';
            });

            new TomSelect("#select-investment",{

            });
        </script>
    </x-slot>
</x-app-layout>

