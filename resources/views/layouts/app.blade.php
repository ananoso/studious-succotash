<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/lccjl4edu11epl7oz52gbcpcsfcta69taad7cdbsdw0yjn8v/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
        <script>
            tinymce.init({
              selector: '#mytextarea'
            });
        </script>
</head>
<body>
<div
    class="flex h-screen bg-gray-50"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    @include('layouts.navigation')
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    @include('layouts.navigation-mobile')
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.top-menu')
        <main class="h-full overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                @if (isset($header))
                    <h2 class="my-6 text-2xl font-semibold text-gray-700">
                        {{ $header }}
                    </h2>
                @endif

                {{ $slot }}
            </div>
        </main>
    </div>
</div>
@if (isset($scripts))
    {{ $scripts }}
@endif
</body>
</html>
