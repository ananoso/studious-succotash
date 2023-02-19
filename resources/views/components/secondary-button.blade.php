<button {{ $attributes->merge(['class' => 'px-4 py-2 text-sm font-medium leading-5 text-center transition-colors duration-150 bg-gray-300 border border-transparent rounded-lg active:bg-gray-300 hover:bg-gray-400 focus:outline-none focus:ring']) }}>
    {{ $slot }}
</button>
