<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="container px-6 mx-auto grid">
            {{ __('You are logged in') }}
            {{ __('Version 1') }}
        </div>
    </div>
</x-app-layout>
